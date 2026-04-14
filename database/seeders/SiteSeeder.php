<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        $data = config('site');

        DB::beginTransaction();

        try {

            // ========================
            // SETTINGS
            // ========================
            foreach (['contact_map_embed','nav','laws','links','featured'] as $key) {
                if (isset($data[$key])) {
                    DB::table('settings')->updateOrInsert(
                        ['key' => $key],
                        ['value' => json_encode($data[$key])]
                    );
                }
            }

            // ========================
            // PAGES
            // ========================
            $pages = [
                'home' => 'Trang chủ',
                'about' => 'Giới thiệu',
                'letter' => 'Thư ngỏ',
                'capacity' => 'Hồ sơ năng lực',
                'clients' => 'Khách hàng',
                'contact' => 'Liên hệ',
            ];

            foreach ($pages as $slug => $title) {
                DB::table('pages')->updateOrInsert(
                    ['slug' => $slug],
                    [
                        'title' => $title,
                        'status' => 'published',
                        'created_at' => now(),
                        'updated_at' => now()
                    ]
                );
            }

            $homeId = DB::table('pages')->where('slug','home')->value('id');

            // ========================
            // SECTION HELPER
            // ========================
            $insertSection = function ($name) use ($homeId) {
                DB::table('sections')->updateOrInsert(
                    ['page_id'=>$homeId,'name'=>$name],
                    ['type'=>'dynamic','updated_at'=>now()]
                );

                return DB::table('sections')
                    ->where('page_id',$homeId)
                    ->where('name',$name)
                    ->value('id');
            };

            $clear = fn($id) => DB::table('section_items')->where('section_id',$id)->delete();

            // ========================
            // HOME DATA
            // ========================
            $map = [
                'serviceTiles' => ['title'=>'title','image'=>'img'],
                'topServiceCards' => ['title'=>'title','icon'=>'icon'],
                'assetItems' => ['title'=>'label','icon'=>'icon'],
                'companyActivities' => ['title'=>'title','description'=>'desc','image'=>'img'],
                'deliveredServices' => ['title'=>'caption','image'=>'img'],
                'cases' => ['title'=>'title','subtitle'=>'tag','image'=>'img'],
            ];

            foreach ($map as $section => $fields) {

                $secId = $insertSection($section);
                $clear($secId);

                foreach ($data['home'][$section] ?? [] as $i => $item) {

                    $row = [
                        'section_id' => $secId,
                        'position' => $i+1,
                        'created_at' => now()
                    ];

                    foreach ($fields as $db => $cfg) {
                        $row[$db] = $item[$cfg] ?? null;
                    }

                    DB::table('section_items')->insert($row);
                }
            }

            // ========================
            // POSTS
            // ========================
            foreach ($data['home']['news'] ?? [] as $item) {

                DB::table('posts')->updateOrInsert(
                    ['slug'=>Str::slug($item['title'])],
                    [
                        'title'=>$item['title'],
                        'content'=>$item['title'], // FIX
                        'status'=>'published',
                        'published_at'=>now(),
                        'created_at'=>now()
                    ]
                );
            }

            // ========================
            // TESTIMONIALS
            // ========================
            DB::table('testimonials')->delete();

            foreach ($data['testimonials'] ?? [] as $item) {

                DB::table('testimonials')->insert([
                    'person'=>$item['person'],
                    'role_vi'=>$item['role_vi'],
                    'role_en'=>$item['role_en'],
                    'content_vi'=>implode("\n",$item['vi'] ?? []),
                    'content_en'=>implode("\n",$item['en'] ?? []),
                    'created_at'=>now()
                ]);
            }

            // ========================
            // TEAM
            // ========================
            DB::table('team_members')->delete();
            DB::table('team_certs')->delete();
            DB::table('team_experiences')->delete();

            foreach ($data['capacity']['team'] ?? [] as $i => $member) {

                $memberId = DB::table('team_members')->insertGetId([
                    'name'=>$member['name'],
                    'slug'=>Str::slug($member['name']),
                    'role_vi'=>$member['role_vi'],
                    'role_en'=>$member['role_en'],
                    'years_experience'=>(int)$member['years'],
                    'image'=>$member['img'] ?? null,
                    'position'=>$i+1,
                    'created_at'=>now()
                ]);

                foreach ($member['certs'] ?? [] as $cert) {
                    DB::table('team_certs')->insert([
                        'member_id'=>$memberId,
                        'content'=>$cert
                    ]);
                }

                foreach ($member['exp_vi'] ?? [] as $exp) {
                    DB::table('team_experiences')->insert([
                        'member_id'=>$memberId,
                        'lang'=>'vi',
                        'content'=>$exp
                    ]);
                }

                foreach ($member['exp_en'] ?? [] as $exp) {
                    DB::table('team_experiences')->insert([
                        'member_id'=>$memberId,
                        'lang'=>'en',
                        'content'=>$exp
                    ]);
                }
            }

            DB::commit();

        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
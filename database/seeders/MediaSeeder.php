<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // حذف البيانات الموجودة مسبقاً
        Media::query()->delete();
        
        // إدراج البيانات الحقيقية من ملف cerac.sql
        $this->insertMediaData();
    }

    private function insertMediaData()
    {
        $mediaData = [
            [4, 'App\\Models\\SiteSetting', 1, '004eb54a-ea74-47ae-ae8a-22444bb1b107', 'favicon', 'favicon', '01K4B5JBV6RAZA5ZM4R6HKWQZR.png', 'image/png', 'public', 'public', 1275, '[]', '[]', '[]', '[]', 4, '2025-09-04 17:09:27', '2025-09-04 17:09:27'],
            [12, 'App\\Models\\HeroSlide', 1, '28ae9b70-40ee-41e1-a206-ff42e7233af2', 'hero_image', '2025-09-05_00-31-37', '01K4BATZR7VGKPHNXAYQS085QZ.jpg', 'image/jpeg', 'public', 'public', 93191, '[]', '[]', '[]', '[]', 1, '2025-09-04 18:41:33', '2025-09-04 18:41:33'],
            [14, 'App\\Models\\HeroSlide', 3, 'cff72f11-47fe-4e2c-9333-36f4935189d7', 'hero_image', '2025-09-05_00-37-33', '01K4BAW0K42T7NT9A5KMPJ527G.jpg', 'image/jpeg', 'public', 'public', 390615, '[]', '[]', '[]', '[]', 1, '2025-09-04 18:42:06', '2025-09-04 18:42:06'],
            [15, 'App\\Models\\HeroSlide', 2, 'd2ab8c8c-3727-4346-a0b8-0670cf7c223d', 'hero_image', '2025-09-05_00-43-25', '01K4BAZXHWP2W999AC0Z8MA3NW.jpg', 'image/jpeg', 'public', 'public', 127529, '[]', '[]', '[]', '[]', 1, '2025-09-04 18:44:14', '2025-09-04 18:44:14'],
            [23, 'App\\Models\\Product', 1, 'c223768e-7c91-47d8-a76f-f40f49d7183b', 'product_image', 'Decorating paste', '01K4C70CWH33ZT2H04ACZB3YGK.jpg', 'image/jpeg', 'public', 'public', 30946, '[]', '[]', '[]', '[]', 1, '2025-09-05 02:53:50', '2025-09-05 02:53:50'],
            [24, 'App\\Models\\Product', 2, '209bb52f-997e-4cc7-ae70-d83b4533db66', 'product_image', 'Construction chemicals', '01K4C71658Z95P0A8E7N9PFZK1.jpg', 'image/jpeg', 'public', 'public', 55570, '[]', '[]', '[]', '[]', 1, '2025-09-05 02:54:16', '2025-09-05 02:54:16'],
            [26, 'App\\Models\\Product', 4, '890e05ba-cd14-4fb3-a3a6-0feeb6a6030d', 'product_image', 'Waterproofing products', '01K4C72V9218D4PF7T7Y51EFV8.jpg', 'image/jpeg', 'public', 'public', 40998, '[]', '[]', '[]', '[]', 1, '2025-09-05 02:55:10', '2025-09-05 02:55:10'],
            [27, 'App\\Models\\Product', 5, '983ee9c0-a71a-4eab-a9c2-938dfdcf96d9', 'product_image', 'Roof insulation compounds', '01K4C73Y3DY5TSRTQZTBNR28S5.jpg', 'image/jpeg', 'public', 'public', 39288, '[]', '[]', '[]', '[]', 1, '2025-09-05 02:55:46', '2025-09-05 02:55:46'],
            [28, 'App\\Models\\Product', 6, 'cec13540-8bca-457c-8b6d-a530f17f6af5', 'product_image', 'Bond Mix', '01K4C74Q63WDHT33FKGEG232KH.jpg', 'image/jpeg', 'public', 'public', 19621, '[]', '[]', '[]', '[]', 1, '2025-09-05 02:56:12', '2025-09-05 02:56:12'],
            [30, 'App\\Models\\Product', 3, '4dcda4b9-42c6-4f2f-9cdb-96e0280405b3', 'product_image', 'Crack Filler 2', '01K4C7B04A76BBJ79DEM0RFJDT.jpg', 'image/jpeg', 'public', 'public', 20342, '[]', '[]', '[]', '[]', 1, '2025-09-05 02:59:37', '2025-09-05 02:59:37'],
            [36, 'App\\Models\\SiteSetting', 1, '5723ab92-1f0b-4e06-87ec-5c6743b7373e', 'logo', 'cerac_logo_400', '01K4CBZQV178708JXXR5JGCK2S.png', 'image/png', 'public', 'public', 47088, '[]', '[]', '[]', '[]', 10, '2025-09-05 04:20:51', '2025-09-05 04:20:51'],
            [37, 'App\\Models\\SiteSetting', 1, 'bf591096-3779-475c-a9ff-2c0f1cf74444', 'logo_light', 'cerac logo light-400', '01K4CBZQWC5ZSCWR6K4CKH6PP3.png', 'image/png', 'public', 'public', 47981, '[]', '[]', '[]', '[]', 11, '2025-09-05 04:20:51', '2025-09-05 04:20:51'],
            [40, 'App\\Models\\Project', 1, 'd551b6ca-0b2d-410b-a0e7-069fe190b562', 'cover_image', 'project_01_4', '01K4CZTP8QM6MND98HNXRADE4N.jpg', 'image/jpeg', 'public', 'public', 24521, '[]', '[]', '{"thumb": true, "square": true}', '[]', 1, '2025-09-05 10:07:37', '2025-09-05 10:07:38'],
            [41, 'App\\Models\\Project', 1, '7146546a-e493-458d-9195-e8a563e49a3b', 'gallery', 'project_01_2', '01K4CZTQ3ARPE8NCYKYS2XFXWY.jpg', 'image/jpeg', 'public', 'public', 41059, '[]', '[]', '{"thumb": true, "square": true}', '[]', 2, '2025-09-05 10:07:38', '2025-09-05 10:07:39'],
            [42, 'App\\Models\\Project', 1, '02cc608d-5d79-483b-9bd2-5abbca541af2', 'gallery', 'project_01_1', '01K4CZTQNC78Z6B544P1XGM999.jpg', 'image/jpeg', 'public', 'public', 39152, '[]', '[]', '{"thumb": true, "square": true}', '[]', 3, '2025-09-05 10:07:39', '2025-09-05 10:07:39'],
            [43, 'App\\Models\\Project', 1, '2d7f3a9d-ccb3-4b97-ad11-d065b4833733', 'gallery', 'project_01_3', '01K4CZTR855GZA20G7YN86Q39B.jpg', 'image/jpeg', 'public', 'public', 39576, '[]', '[]', '{"thumb": true, "square": true}', '[]', 4, '2025-09-05 10:07:39', '2025-09-05 10:07:40'],
            [44, 'App\\Models\\Project', 1, '2344e7d9-a3fb-4ba8-9361-61c5da25950f', 'gallery', 'project_01_5', '01K4CZTRT8G3H4CD43BF5FAK0A.jpg', 'image/jpeg', 'public', 'public', 60540, '[]', '[]', '{"thumb": true, "square": true}', '[]', 5, '2025-09-05 10:07:40', '2025-09-05 10:07:41'],
            [45, 'App\\Models\\Project', 2, '83404e5d-e9be-4c3b-b76e-4b0ff01eb9bc', 'cover_image', 'project_02_4', '01K4D03VVCZ5JS8E83YGM42K6J.jpg', 'image/jpeg', 'public', 'public', 165255, '[]', '[]', '{"thumb": true, "square": true}', '[]', 1, '2025-09-05 10:12:38', '2025-09-05 10:12:39'],
            [46, 'App\\Models\\Project', 2, 'e5d1918b-0999-41d2-92c9-454ea15c3ed0', 'gallery', 'project_02_2', '01K4D03WGSSEJFQ9ZFJMDQCECA.jpg', 'image/jpeg', 'public', 'public', 52016, '[]', '[]', '{"thumb": true, "square": true}', '[]', 2, '2025-09-05 10:12:39', '2025-09-05 10:12:39'],
            [47, 'App\\Models\\Project', 2, '8b0c3af9-1d47-413c-aa4a-d3e4d2956952', 'gallery', 'project_02_1', '01K4D03X43QWH1VB1KBTWTJJW7.jpg', 'image/jpeg', 'public', 'public', 208249, '[]', '[]', '{"thumb": true, "square": true}', '[]', 3, '2025-09-05 10:12:39', '2025-09-05 10:12:40'],
            [48, 'App\\Models\\Project', 2, 'a5249f35-47fe-41ec-bdbf-1a0cb6e6ffd4', 'gallery', 'project_02_5', '01K4D03XRB4WA3R5K4H0GRBXFC.jpg', 'image/jpeg', 'public', 'public', 95518, '[]', '[]', '{"thumb": true, "square": true}', '[]', 4, '2025-09-05 10:12:40', '2025-09-05 10:12:41'],
            [49, 'App\\Models\\Project', 2, 'de760ef4-229b-43b6-9eb0-3e356d84aa50', 'gallery', 'project_02_3', '01K4D03YBEFSVER6BJ6NHPE3GH.jpg', 'image/jpeg', 'public', 'public', 56106, '[]', '[]', '{"thumb": true, "square": true}', '[]', 5, '2025-09-05 10:12:41', '2025-09-05 10:12:41'],
            [50, 'App\\Models\\Project', 3, '15a2a00a-bdef-4cfd-86c4-cbf6db9b0518', 'cover_image', 'project_03_1', '01K4D0ND9NXW2YEAMXRQ8BW81D.jpg', 'image/jpeg', 'public', 'public', 100990, '[]', '[]', '{"thumb": true, "square": true}', '[]', 1, '2025-09-05 10:22:13', '2025-09-05 10:22:14'],
            [51, 'App\\Models\\Project', 3, 'bf8fe7bf-ba63-4132-ae83-a6fbf241d11a', 'gallery', 'project_03_3', '01K4D0NDXZGX7YXP27P6PNNKCX.jpg', 'image/jpeg', 'public', 'public', 127015, '[]', '[]', '{"thumb": true, "square": true}', '[]', 2, '2025-09-05 10:22:14', '2025-09-05 10:22:14'],
            [52, 'App\\Models\\Project', 3, '7d436ca7-5533-407c-b318-172ef5c3d03a', 'gallery', 'project_03_2', '01K4D0NEJ891EWHAF0ZAKNDKVM.jpg', 'image/jpeg', 'public', 'public', 92513, '[]', '[]', '{"thumb": true, "square": true}', '[]', 3, '2025-09-05 10:22:14', '2025-09-05 10:22:15'],
            [53, 'App\\Models\\Project', 3, '34fc44a9-0da9-4f64-a55f-73c9b341fde3', 'gallery', 'project_03_5', '01K4D0NF5VJ6PF9FG3JKY0KP0D.jpg', 'image/jpeg', 'public', 'public', 90689, '[]', '[]', '{"thumb": true, "square": true}', '[]', 4, '2025-09-05 10:22:15', '2025-09-05 10:22:15'],
            [54, 'App\\Models\\Project', 3, 'ea241f36-4133-4cff-bbb2-c35c3ea956e0', 'gallery', 'project_03_4', '01K4D0NFR9V30HXWT7RS04YM1A.jpg', 'image/jpeg', 'public', 'public', 72890, '[]', '[]', '{"thumb": true, "square": true}', '[]', 5, '2025-09-05 10:22:15', '2025-09-05 10:22:16'],
            [55, 'App\\Models\\Partner', 1, 'ccd4fa79-3a2d-4cc9-9297-a69a6ccf774b', 'logo', 'partner01', '01K4DDK3VQ5Z25Y1K32MJGHMK3.jpg', 'image/jpeg', 'public', 'public', 26061, '[]', '[]', '[]', '[]', 1, '2025-09-05 14:08:09', '2025-09-05 14:08:09'],
            [56, 'App\\Models\\Partner', 2, 'b08f8e34-851b-483a-940f-91e647d4884f', 'logo', 'partner02', '01K4DDKT54JRG1F8X4B3WAJTCC.jpg', 'image/jpeg', 'public', 'public', 23974, '[]', '[]', '[]', '[]', 1, '2025-09-05 14:08:32', '2025-09-05 14:08:32'],
            [57, 'App\\Models\\Partner', 3, 'a163476d-b320-49e3-8a91-7b96a2af0df5', 'logo', 'partner03', '01K4DDME261T6S8AB6C311C5NZ.jpg', 'image/jpeg', 'public', 'public', 35669, '[]', '[]', '[]', '[]', 1, '2025-09-05 14:08:52', '2025-09-05 14:08:52'],
            [60, 'App\\Models\\Partner', 5, '8246b619-b35a-44a9-bd48-1c3de04dc94e', 'logo', 'partner05', '01K4DDNXG48RM839EWYP62WVJT.jpg', 'image/jpeg', 'public', 'public', 50255, '[]', '[]', '[]', '[]', 1, '2025-09-05 14:09:41', '2025-09-05 14:09:41'],
            [61, 'App\\Models\\Partner', 4, '51991847-335b-42a5-b3fd-60de9f98bfc5', 'logo', 'partner04', '01K4DDPBMRGZVW6BV05TEE981W.jpg', 'image/jpeg', 'public', 'public', 25928, '[]', '[]', '[]', '[]', 1, '2025-09-05 14:09:56', '2025-09-05 14:09:56'],
            [62, 'App\\Models\\Client', 1, '70ed8739-e6da-40c2-9b84-a4b3e0a5c81f', 'logo', 'client_01', '01K4DJ1910X6396GMF1P0E4XDE.jpg', 'image/jpeg', 'public', 'public', 33677, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:25:48', '2025-09-05 15:25:50'],
            [63, 'App\\Models\\Client', 2, '5001fb51-2209-4d0f-bb27-5cac122c05b9', 'logo', 'client_03', '01K4DJ22WK26HTRZ0BCARV53RV.jpg', 'image/jpeg', 'public', 'public', 68546, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:26:14', '2025-09-05 15:26:14'],
            [64, 'App\\Models\\Client', 3, 'b027637b-1aea-43f6-9f25-d6434e38f425', 'logo', 'client_02', '01K4DJ2FXNET915KH66VK2701Z.jpg', 'image/jpeg', 'public', 'public', 37935, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:26:27', '2025-09-05 15:26:28'],
            [65, 'App\\Models\\Client', 4, 'e6bb8341-f0da-47d6-bbdb-5bb88240bba2', 'logo', 'client_08', '01K4DJ5459VGKWA54M0KPFNSEY.jpg', 'image/jpeg', 'public', 'public', 98131, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:27:54', '2025-09-05 15:27:54'],
            [66, 'App\\Models\\Client', 5, 'f3cb3aaf-e5d4-42f6-93ac-a3728ec427e2', 'logo', 'client_05', '01K4DJ5S0M29EFNM38S3VQ1SQA.jpg', 'image/jpeg', 'public', 'public', 90911, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:28:15', '2025-09-05 15:28:15'],
            [67, 'App\\Models\\Client', 6, 'ebf40990-246d-4cf0-b4d2-61075d88a695', 'logo', 'client_04', '01K4DJ709S6SB5PW0MRN9N29EW.jpg', 'image/jpeg', 'public', 'public', 45402, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:28:55', '2025-09-05 15:28:56'],
            [68, 'App\\Models\\Client', 7, 'b59f3370-9166-43f6-9469-e66f304871fa', 'logo', 'client_07', '01K4DJ7VG2K6636JTQG115SRTM.jpg', 'image/jpeg', 'public', 'public', 91363, '[]', '[]', '{"thumb": true}', '[]', 1, '2025-09-05 15:29:23', '2025-09-05 15:29:23'],
            [71, 'App\\Models\\Popup', 1, 'e3c21a15-3515-4f05-8bff-679b5e7fec70', 'popup_images', 'WhatsApp Image 2025-09-03 at 10.51.34 PM', '01K4ETA71SKMXKNEN4MYTJDCST.jpeg', 'image/jpeg', 'public', 'public', 186932, '[]', '[]', '[]', '[]', 1, '2025-09-06 03:09:44', '2025-09-06 03:09:44'],
            [72, 'App\\Models\\Popup', 6, '198e85ec-719b-4767-a993-1ce5ac9d5630', 'popup_images', '2025-09-07_08-21-38', '01K4HB56FX4FCCGJYQ5H03JNJY.jpg', 'image/jpeg', 'public', 'public', 134002, '[]', '[]', '[]', '[]', 1, '2025-09-07 02:42:34', '2025-09-07 02:42:34'],
        ];

        foreach ($mediaData as $data) {
            Media::create([
                'id' => $data[0],
                'model_type' => $data[1],
                'model_id' => $data[2],
                'uuid' => $data[3],
                'collection_name' => $data[4],
                'name' => $data[5],
                'file_name' => $data[6],
                'mime_type' => $data[7],
                'disk' => $data[8],
                'conversions_disk' => $data[9],
                'size' => $data[10],
                'manipulations' => $data[11],
                'custom_properties' => $data[12],
                'generated_conversions' => $data[13],
                'responsive_images' => $data[14],
                'order_column' => $data[15],
                'created_at' => $data[16],
                'updated_at' => $data[17],
            ]);
        }
    }
}

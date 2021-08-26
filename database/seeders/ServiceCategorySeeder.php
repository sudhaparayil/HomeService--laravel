<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('service_categories')->insert([
          [
              "name" =>"AC",
              "slug" =>"ac",
              "image" =>"1521969345.png"
          ],
          [
            "name" =>"Carpentary",
            "slug" =>"carpentary",
            "image" =>"1521969454.png"
          ],
          [
            "name" =>"Beauty",
            "slug" =>"carpentary",
            "image" =>"1521969358.png"
          ],
          [
            "name" =>"Home Cleaning",
            "slug" =>"home-cleaning",
            "image" =>"1521969446.png"
          ],
          [
            "name" =>"Waterpurifer",
            "slug" =>"waterpurifer",
            "image" =>"1521972593.png"
          ],
          [
            "name" =>"Computer Repaire",
            "slug" =>"computer-repaire",
            "image" =>"1521969512.png"
          ],
          [
            "name" =>"TV",
            "slug" =>"tv",
            "image" =>"1521969522.png"
          ],
          [
            "name" =>"Pets Control",
            "slug" =>"pets-control",
            "image" =>"1521969464.png"
          ],
          [
            "name" =>"Refrigenerator",
            "slug" =>"refrigenerator",
            "image" =>"1521969536.png"
          ],
          [
            "name" =>"Gayser",
            "slug" =>"gayser",
            "image" =>"1521969558.png"
          ]

          ]); 
    }
}

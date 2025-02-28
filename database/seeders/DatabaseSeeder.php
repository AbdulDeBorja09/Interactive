<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Eric Pogi',
                'email' => 'eric@admin.com',
                'password' => Hash::make("ericpogi123"),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Calamba Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make("password123"),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('rooms')->insert([
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg01',
                'text_id' => 'text-lg01',
                'room_name' => 'City Housing and Settlement Department',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg02',
                'text_id' => 'text-lg02',
                'room_name' => 'Land Bank',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg04',
                'text_id' => 'text-lg04',
                'room_name' => 'City Health Service Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg05',
                'text_id' => 'text-lg05',
                'room_name' => 'Samahan ng mga Manggagawa sa City Government ng Calamba',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg08',
                'text_id' => 'text-lg08',
                'room_name' => 'City Treasury Management Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg09',
                'text_id' => 'text-lg09',
                'room_name' => 'Information, Investment Promotions & Employment Services Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg10',
                'text_id' => 'text-lg10',
                'room_name' => 'City Social Service and Youth Development Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg11',
                'text_id' => 'text-lg11',
                'room_name' => 'Child Protection Unit',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg12',
                'text_id' => 'text-lg12',
                'room_name' => 'Stock Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg14',
                'text_id' => 'text-lg14',
                'room_name' => 'District Office of Cong. Cha Hernandez',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg16',
                'text_id' => 'text-lg16',
                'room_name' => 'Veterinary and Slaughterhouse Management Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg17',
                'text_id' => 'text-lg17',
                'room_name' => 'Agricultural Services Department',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg19',
                'text_id' => 'text-lg19',
                'room_name' => 'PWD Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg20',
                'text_id' => 'text-lg20',
                'room_name' => 'Office of Provincial Prosecutor',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg23',
                'text_id' => 'text-lg23',
                'room_name' => 'Office of Provincial Prosecutor',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg24',
                'text_id' => 'text-lg24',
                'room_name' => 'Cooperative and Livelihood Development Department',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg25',
                'text_id' => 'text-lg25',
                'room_name' => 'Bids and Awards Committee',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg26',
                'text_id' => 'text-lg26',
                'room_name' => 'COMELEC',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Lower Ground',
                'room_id' => 'room-lg27',
                'text_id' => 'text-lg27',
                'room_name' => 'Stock Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf01',
                'text_id' => 'text-gf01',
                'room_name' => 'Cultural Affairs, Tourism, & Sports Dev’t Department',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf02',
                'text_id' => 'text-gf02',
                'room_name' => 'City Registry Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf04',
                'text_id' => 'text-gf04',
                'room_name' => 'Electrical Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf05',
                'text_id' => 'text-gf05',
                'room_name' => 'City Treasury Management Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf06',
                'text_id' => 'text-gf06',
                'room_name' => 'Communication Room / Server Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf07',
                'text_id' => 'text-gf07',
                'room_name' => 'Server Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf09',
                'text_id' => 'text-gf09',
                'room_name' => 'City Assessors Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf12a',
                'text_id' => 'text-gf12a',
                'room_name' => 'Tricycle Franchising Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf12b',
                'text_id' => 'text-gf12b',
                'room_name' => 'Business Permits and Licensing Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Ground Floor',
                'room_id' => 'room-gf13',
                'text_id' => 'text-gf13',
                'room_name' => 'Business Permits and Licensing Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f01',
                'text_id' => 'text-2f01',
                'room_name' => 'City Accounting & Internal Control Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f02',
                'text_id' => 'text-2f02',
                'room_name' => 'City Legal Services Offices',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f03',
                'text_id' => 'text-2f03',
                'room_name' => 'City Human Resource Management Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f05a',
                'text_id' => 'text-2f05a',
                'room_name' => 'COA',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f05b',
                'text_id' => 'text-2f05b',
                'room_name' => 'COA',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f06',
                'text_id' => 'text-2f06',
                'room_name' => 'Electrical Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f07',
                'text_id' => 'text-2f07',
                'room_name' => 'DILG',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f08',
                'text_id' => 'text-2f08',
                'room_name' => 'Mayor’s Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f10',
                'text_id' => 'text-2f10',
                'room_name' => 'Description for Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f11',
                'text_id' => 'text-2f11',
                'room_name' => 'Maintenance Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f12',
                'text_id' => 'text-2f12',
                'room_name' => 'Old Canteen',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f13',
                'text_id' => 'text-2f13',
                'room_name' => 'Sangguniang Panglunsod Records',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f14',
                'text_id' => 'text-2f14',
                'room_name' => 'City Engineering Infrastructure Development Department',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f16',
                'text_id' => 'text-2f16',
                'room_name' => 'Mayor’s Office Internal Audit Services',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f17',
                'text_id' => 'text-2f17',
                'room_name' => 'City Population Management Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f19',
                'text_id' => 'text-2f19',
                'room_name' => 'City Planning & Development Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Second Floor',
                'room_id' => 'room-2f20',
                'text_id' => 'text-2f20',
                'room_name' => 'City Budget Management Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f01',
                'text_id' => 'text-3f01',
                'room_name' => 'City Councilor Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f02',
                'text_id' => 'text-3f02',
                'room_name' => 'City Councilor Office – Saturnino Lajara',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f03',
                'text_id' => 'text-3f03',
                'room_name' => 'City Councilor Office – Moises Morales',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f04',
                'text_id' => 'text-3f04',
                'room_name' => 'City Councilor Office – Edison Natividad',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f05',
                'text_id' => 'text-3f05',
                'room_name' => 'ABC President',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f06',
                'text_id' => 'text-3f06',
                'room_name' => 'SK President',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f08',
                'text_id' => 'text-3f08',
                'room_name' => 'CPMO',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f09',
                'text_id' => 'text-3f09',
                'room_name' => 'City Councilor Office – Lean Aldabe',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f10',
                'text_id' => 'text-3f10',
                'room_name' => 'Electrical Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f11',
                'text_id' => 'text-3f11',
                'room_name' => 'City Councilor Office – Pursing Oruga',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f12',
                'text_id' => 'text-3f12',
                'room_name' => 'City Councilor Office – Joselito Catindig',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f13',
                'text_id' => 'text-3f13',
                'room_name' => 'Vice Mayor’s Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f14',
                'text_id' => 'text-3f14',
                'room_name' => 'Description for Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f15',
                'text_id' => 'text-3f15',
                'room_name' => 'Sangguniang Panglungsod Secretariat',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f19',
                'text_id' => 'text-3f19',
                'room_name' => 'Budget and Supplies',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f20',
                'text_id' => 'text-3f20',
                'room_name' => 'Mayor’s Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f21',
                'text_id' => 'text-3f21',
                'room_name' => 'Stock Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f22',
                'text_id' => 'text-3f22',
                'room_name' => 'Conference Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f23',
                'text_id' => 'text-3f23',
                'room_name' => 'Pantry',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f24',
                'text_id' => 'text-3f24',
                'room_name' => 'Office of Executive Assistant',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f25',
                'text_id' => 'text-3f25',
                'room_name' => 'Electrical Room',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f26',
                'text_id' => 'text-3f26',
                'room_name' => 'City Admin Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f29',
                'text_id' => 'text-3f29',
                'room_name' => 'Administration Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f30',
                'text_id' => 'text-3f30',
                'room_name' => 'City Councilor Office – Teruel',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f31',
                'text_id' => 'text-3f31',
                'room_name' => 'City Councilor Office – Arvin Manguiat',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f32',
                'text_id' => 'text-3f32',
                'room_name' => 'City Councilor Office – Dian Esperidion',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f33',
                'text_id' => 'text-3f33',
                'room_name' => 'City Councilor Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'floor' => 'Third Floor',
                'room_id' => 'room-3f34',
                'text_id' => 'text-3f34',
                'room_name' => 'City Councilor Office',
                'room_desc' => 'Description for Room',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}

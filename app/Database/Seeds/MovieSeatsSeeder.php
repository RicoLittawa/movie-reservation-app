<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MovieSeatsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'seat_letter' => "A",
                'seat_number' => 1,
            ],
            [
                'seat_letter' => "A",
                'seat_number' => 2,
            ],
            [
                'seat_letter' => "A",
                'seat_number' => 3,
            ],
            [
                'seat_letter' => "A",
                'seat_number' => 4,
            ],
            [
                'seat_letter' => "A",
                'seat_number' => 5,
            ],
            [
                'seat_letter' => "B",
                'seat_number' => 6,
            ],
            [
                'seat_letter' => "B",
                'seat_number' => 7,
            ],
            [
                'seat_letter' => "B",
                'seat_number' => 8,
            ],
            [
                'seat_letter' => "B",
                'seat_number' => 9,
            ],
            [
                'seat_letter' => "B",
                'seat_number' => 10,
            ],
            [
                'seat_letter' => "C",
                'seat_number' => 11,
            ],
            [
                'seat_letter' => "C",
                'seat_number' => 12,
            ], 
            [
                'seat_letter' => "C",
                'seat_number' => 13,
            ], 
            [
                'seat_letter' => "C",
                'seat_number' => 14,
            ], 
            [
                'seat_letter' => "C",
                'seat_number' => 15,
            ],
            [
                'seat_letter' => "D",
                'seat_number' => 16,
            ],
            [
                'seat_letter' => "D",
                'seat_number' => 17,
            ],
            [
                'seat_letter' => "D",
                'seat_number' => 18,
            ],
            [
                'seat_letter' => "D",
                'seat_number' => 19,
            ],
            [
                'seat_letter' => "D",
                'seat_number' => 20,
            ],
            [
                'seat_letter' => "E",
                'seat_number' => 21,
            ],
            [
                'seat_letter' => "E",
                'seat_number' => 22,
            ],
            [
                'seat_letter' => "E",
                'seat_number' => 23,
            ],
            [
                'seat_letter' => "E",
                'seat_number' => 24,
            ],
            [
                'seat_letter' => "E",
                'seat_number' => 25,
            ],
            [
                'seat_letter' => "F",
                'seat_number' => 26,
            ],
            [
                'seat_letter' => "F",
                'seat_number' => 27,
            ],
            [
                'seat_letter' => "F",
                'seat_number' => 28,
            ],
            [
                'seat_letter' => "F",
                'seat_number' => 29,
            ],
            [
                'seat_letter' => "F",
                'seat_number' => 30,
            ],

        ];
        $this->db->table('movieseats')->insertBatch($data);
    }
}

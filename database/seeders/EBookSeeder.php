<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('e_books')->insert([
            [
                'title' => 'Nineteen Eighty-Four',
                'author' => 'Hege Thora',
                'description' => 'In the year 1984, the world is divided into three massive countries that are in endless war with each other: Oceania, Eurasia and Eastasia. Each country has a totalitarian government, meaning that the government tries to control everything that its people do. Great Britain is now named "Airstrip One" and is part of Oceania. Oceania is ruled by "the Party". They use the "Thought Police" and "telescreens" (two-way televisions) to spy on people. People also have to show love for the Party and its leader, Big Brother. While pictures of Big Brother are everywhere, he is never seen for real, and he may not even exist.'
            ],
            [
                'title' => "The Handmaid's Tale",
                'author' => 'Florianne Shantanu',
                'description' => "After a staged attack that killed the President of the United States and most of Congress, a radical political group called the Sons of Jacob uses theonomic ideology to launch a revolution.[7] The United States Constitution is suspended, newspapers are censored, and what was formerly the United States of America is changed into a military dictatorship known as the Republic of Gilead. The new regime moves quickly to consolidate its power, overtaking all other religious groups, including traditional Christian denominations. In addition, the regime reorganizes society using a peculiar interpretation of some Old Testament ideas, and a new militarized, hierarchical model of social and religious fanaticism among its newly created social classes. Above all, the biggest change is the severe limitation of people's rights, especially those of women, who are not allowed to read, write, own property, or handle money. Most significantly, women are deprived of control over their own reproductive functions."
            ],
            [
                'title' => 'The Lincoln Highway',
                'author' => 'Bernhard Vida',
                'description' => 'The Lincoln Highway might just be one of the best novels of this decade, which is a feat considering A Gentleman in Moscow, also holds that distinction (in this reviewer’s mind, anyway). Set in the 1950s, The Lincoln Highway is filled with nostalgia as well as the gentle naïveté and hijinks of those who are young, optimistic, and on a mission. The story follows four boys who set out to travel the country in search of a fresh start: Emmett and Billy want to find their mother who left them when they were young, and Duchess and Woolly are on the hunt for a stashed wad of cash. Sometimes their dreams are aligned but often they are not. In other words, adventure ensues: There’s train hopping and car stealing, and with that comes the inevitability of trouble sparked from both good and bad intentions. Each of these young men is chasing his dreams, but their pasts—whether violent or sad—are never far behind. A remarkable work of storytelling that is a 2021 favorite. —Al Woodworth, Amazon Editor'
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'description' => 'In A Brief History of Time, Stephen Hawking attempts to explain a range of subjects in cosmology, including the Big Bang, black holes and light cones, to the non-specialist reader. His main goal is to give an overview of the subject, but he also attempts to explain some complex mathematics. In the 1996 edition of the book and subsequent editions, Hawking discusses the possibility of time travel and wormholes and explores the possibility of having a Universe without a quantum singularity at the beginning of time.'
            ],
            [
                'title' => 'Cosmos',
                'author' => 'Dada Kyung-sook',
                'description' => 'Cosmos utilizes a light, conversational tone to render complex scientific topics readable for a lay audience. On many topics, the book encompasses a more concise, refined presentation of previous ideas about which Sagan had written.'
            ]
        ]);
    }
}

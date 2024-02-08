<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $questions = [

      [
        'question' => 'Sprichst du eine dieser Sprachen fliesend?',
        'options' => ['PHP', 'Angular/Typescript', 'Javascript'],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Ja', 'proceed' => '1'],
          ['option' => 'Nein', 'proceed' => '0'],
        ]
      ],
      [
        'question' => 'Hast du mit einem dieser Frameworks / Plattform bereits gearbeitet? Mehrfach Auswahl min 2',
        'options' => [],
        "type" => ["checkbox"],
        'answers' => [
          ['option' => 'Laravel', 'proceed' => '1'],
          ['option' => 'Angular', 'proceed' => '1'],
          ['option' => 'React-Native', 'proceed' => '1'],
          ['option' => 'node.js / Express', 'proceed' => '0'],
          ['option' => 'git', 'proceed' => '0'],
          ['option' => 'Docker', 'proceed' => '0'],
        ]
      ],
      [
        'question' => 'In welchem Framework hast du deiner Meinung nach die meiste Erfahrung?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Laravel', 'proceed' => '1'],
          ['option' => 'Angular', 'proceed' => '1'],
          ['option' => 'React-Native', 'proceed' => '1'],
          ['option' => 'node.js / Express', 'proceed' => '1'],
        ]
      ],
      [
        'question' => 'Wie lange programmierst du schon?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => '1 Jar -> 3 Jahre', 'proceed' => '0'],
          ['option' => '3 Jahre -> 5 Jahre', 'proceed' => '1'],
          ['option' => '5 Jahre -> 10 Jahre', 'proceed' => '1'],
        ]
      ],
      [
        'question' => 'Anwendungsentwicklung ist für dich?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Spaß und Herausforderung', 'proceed' => '1'],
          ['option' => 'Deine Berufung', 'proceed' => '1'],
          ['option' => 'Hobby', 'proceed' => '1'],
          ['option' => 'deine Zukunft', 'proceed' => '1'],
          ['option' => 'dein Beruf', 'proceed' => '0'],
          ['option' => 'ein Mittel zum zweck', 'proceed' => '0'],
        ]
      ],
      [
        'question' => 'Hast du interesse an neuen spannenden Projekten?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Ja', 'proceed' => '1'],
          ['option' => 'Nein', 'proceed' => '0'],
        ]
      ],
      [
        'question' => 'Teamplayer, oder Einzelkämpfer?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Einzelkämpfer', 'proceed' => '0'],
          ['option' => 'Teamplayer', 'proceed' => '1'],
          ['option' => 'beides', 'proceed' => '1'],
        ]
      ],
      [
        'question' => 'Zuvor in einem Team entwickelt?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Ja', 'proceed' => '1'],
          ['option' => 'Nein', 'proceed' => '1'],
        ]
      ],

      [
        'question' => 'Lernst du Pro Aktiv neue Programmiersprachen/ Techniken?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Ja', 'proceed' => '1'],
          ['option' => 'Nein', 'proceed' => '0'],
        ]
      ],

      [
        'question' => 'Schon selbst für dich oder dein Umfeld Apps oder Anwendungen entwickelt?',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Ja', 'proceed' => '1'],
          ['option' => 'Nein', 'proceed' => '1'],
        ]
      ],

      [
        'question' => 'Lieber',
        'options' => [],
        "type" => ["radio"],
        'answers' => [
          ['option' => 'Homeoffice', 'proceed' => '1'],
          ['option' => 'Büro', 'proceed' => '1'],
          ['option' => 'beides', 'proceed' => '1'],
        ]
      ],

      [
        'question' => 'Welche Erwartungen hast du an einen neuen Arbeitsplatz? Textfeld freie Eingabe',
        'options' => [],
        "type" => ["text"],
        'answers' => []
      ],

    ];

    foreach ($questions as $key) {
      Questions::create([
        'questions' => $key,
      ]);
    }
  }
}

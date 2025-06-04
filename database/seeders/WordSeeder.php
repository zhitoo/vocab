<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $essentialWords = [
            ['word' => 'abandon', 'meaning' => 'ترک کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'keen', 'meaning' => 'مشتاق', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'jealous', 'meaning' => 'حسود', 'level' => 'B1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'tact', 'meaning' => 'تدبیر', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'oath', 'meaning' => 'قسم', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'vacant', 'meaning' => 'خالی', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'hardship', 'meaning' => 'سختی', 'level' => 'B2', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'gallant', 'meaning' => 'شجاع', 'level' => 'C1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'data', 'meaning' => 'داده', 'level' => 'B1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'unaccustomed', 'meaning' => 'ناآشنا', 'level' => 'C1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'bachelor', 'meaning' => 'مجرد', 'level' => 'B2', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'qualify', 'meaning' => 'واجد شرایط بودن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'corpse', 'meaning' => 'جسد', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'conceal', 'meaning' => 'پنهان کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'dismal', 'meaning' => 'غم‌انگیز', 'level' => 'C1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'frigid', 'meaning' => 'سرد', 'level' => 'C1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'inhabit', 'meaning' => 'ساکن بودن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'numb', 'meaning' => 'بی‌حس', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'peril', 'meaning' => 'خطر', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'recline', 'meaning' => 'لَم دادن', 'level' => 'C1', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'shriek', 'meaning' => 'جیغ زدن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'sinister', 'meaning' => 'شوم', 'level' => 'C1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'tempt', 'meaning' => 'وسوسه کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'wager', 'meaning' => 'شرط‌بندی', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'typical', 'meaning' => 'معمولی', 'level' => 'B1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'minimum', 'meaning' => 'حداقل', 'level' => 'B2', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'scarce', 'meaning' => 'کمیاب', 'level' => 'C1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'annual', 'meaning' => 'سالانه', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'persuade', 'meaning' => 'متقاعد کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'essential', 'meaning' => 'ضروری', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'blend', 'meaning' => 'مخلوط کردن', 'level' => 'B1', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'visible', 'meaning' => 'قابل رؤیت', 'level' => 'B1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'expensive', 'meaning' => 'گران', 'level' => 'A2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'talent', 'meaning' => 'استعداد', 'level' => 'B1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'devise', 'meaning' => 'طراحی کردن', 'level' => 'C1', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'wholesale', 'meaning' => 'عمده‌فروشی', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'vapor', 'meaning' => 'بخار', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'eliminate', 'meaning' => 'حذف کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'villain', 'meaning' => 'شرور', 'level' => 'C1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'dense', 'meaning' => 'متراکم', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'utilize', 'meaning' => 'استفاده کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'humid', 'meaning' => 'مرطوب', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'theory', 'meaning' => 'نظریه', 'level' => 'B2', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'descend', 'meaning' => 'فرود آمدن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'circulate', 'meaning' => 'در جریان بودن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'enormous', 'meaning' => 'عظیم', 'level' => 'B1', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'predict', 'meaning' => 'پیش‌بینی کردن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'vanish', 'meaning' => 'غیبش زدن', 'level' => 'B2', 'part_of_speech' => 'verb', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'tradition', 'meaning' => 'سنت', 'level' => 'B1', 'part_of_speech' => 'noun', 'created_at' => now(), 'updated_at' => now()],
            ['word' => 'rural', 'meaning' => 'روستایی', 'level' => 'B2', 'part_of_speech' => 'adjective', 'created_at' => now(), 'updated_at' => now()],
        ];
        DB::table('words')->insert($essentialWords);
    }
}

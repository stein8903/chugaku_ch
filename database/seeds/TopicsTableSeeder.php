<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        	"title"=>"後藤真希に不倫疑惑 夫が相手男性に対し損害賠償を請求か",
        	"body"=>"
小誌取材班はその裁判資料を入手した。後藤本人が署名した陳述書にはこうある。〈2人でタクシーを拾い、Bさんが宿泊していたアパホテルに遊びに行くことになり、その場でBさんと肉体関係を持ちました。（中略）22日の昼と23日の朝の計2回肉体関係を持ってしまいました〉（後藤の陳述書より）http://image.news.livedoor.com/newsimage/stf/f/1/f11d8_1386_438658ad9293cc665ecfe2900ee91cb7.jpg",
			"thumnail"=>"http://image.news.livedoor.com/newsimage/stf/f/1/f11d8_1386_438658ad9293cc665ecfe2900ee91cb7.jpg",
			"user_name"=>"匿名",
			"likes"=>10,
			"dislikes"=>1,
			"count_comments"=>0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table("topics")->insert($param);

        $param = [
            "title"=>"医者妻の皆さん語りませんか？【悩み】【あるある】など",
            "body"=>"
実生活ではあまり具体的な話はしないので 
勤務医、開業医、研究問わずさまざまなお話が聞きたいです。 

我が家の最近の悩みごとは 
主人が医局に残るか、そろそろ実家の医院に戻るか話す機会が増えてきました。 
また、子どもの学費をどのくらい貯めておくかも最近の話題です。 
子ども二人はまだ小学生ですが、私立医大の学費をみると今から考えておく必要があるのかなと思っています。 

あるあるとしてはMRさんからのお弁当が地味に嬉しいです笑 ",
            "thumnail"=>"https://up.gc-img.net/post_img_web/2019/04/agBtxvzK1NDSTUa_17498_s.jpeg",
            "user_name"=>"匿名",
            "likes"=>8,
            "dislikes"=>2,
            "count_comments"=>0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table("topics")->insert($param);
    }
}

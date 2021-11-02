<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss version="2.0">
    <channel>
        <title>{{$seoset->meta_title}}</title>
        <link>
        {{url('/')}}></link>
        <description>{{$seoset->meta_description}}</description>
        <language>tr</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title_tr }}]]></title>
                <link>{{URL::to('/'.str_slug($post->title_tr).'/'.$post->id.'/'.'haberi')}}</link>
                <description><![CDATA[{!! $post->description_tr!!}]]></description>
                <category>{{ $post->category_tr}}</category>
                <content>
                    <![CDATA[{!! $post->details_tr !!}]]>
                </content>
                <author>{{$seoset->meta_author}}></author>
                <guid>{{URL::to('/'.str_slug($post->title_tr).'/'.$post->id.'/'.'haberi')}}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
                <enclosure url="{{URL::to('/'.$post->image)}}" type="image/jpeg"/>

            </item>
        @endforeach
    </channel>
</rss>

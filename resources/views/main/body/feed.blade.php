<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>


<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:media="http://search.yahoo.com/mrss/">
    <channel>
        <title>{{ $seoset->meta_title }}</title>
        <atom:link href="https://www.gazetekale.com/feed/" rel="self" type="application/rss+xml" />
        <link>{{ url('/') }}</link>
        <description>{{ $seoset->meta_description }}</description>
        <lastBuildDate>{{ now()->toRssString() }}</lastBuildDate>
        <language>tr</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>
        <image>
            <url>"https://gazetekale.com/public/icon/favicon.ico"</url>
            <title>{{ $seoset->meta_title }}</title>
            <link>{{ URL::to('/') }}</link>
            <width>32</width>
            <height>32</height>
        </image>
        @foreach ($posts as $post)
            <item>
                <title>{{ $post->title_tr }}</title>
                <link>{{ URL::to('/' . 'haber-' . str_slug($post->title_tr) . '-' . $post->id) }}</link>
                <dc:creator>
                    <![CDATA[{{ $seoset->meta_author }}]]>
                </dc:creator>
                <pubDate>{{ $post->created_at }}</pubDate>
                <category>
                    <![CDATA[{{ $post->category_tr }}]]>
                </category>
                <description>
                    <![CDATA[{!! html_entity_decode($post->details_tr) !!}]]>
                </description>
                {{-- <guid isPermaLink="false">{{ URL::to('/' . 'haber-' . str_slug($post->title_tr) . '-' . $post->id) }} --}}
                {{-- </guid> --}}

                <media:thumbnail url="{{ URL::to('/' . $post->image) }}" />
                <media:content url="{{ URL::to('/' . $post->image) }}" medium="image">
                    <media:title type="html">{{ $post->title_tr }}</media:title>
                </media:content>
            </item>
        @endforeach
    </channel>
</rss>

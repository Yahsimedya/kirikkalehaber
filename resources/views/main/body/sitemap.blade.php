<?php


header('content-type: application/xml; charset="utf8"', true);

date_default_timezone_set('Europe/Istanbul');

?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:example="http://www.example.com/schemas/example_schema"> <!-- namespace extension -->
    @foreach ($posts as $post)
        <url>

            <loc>{{ url('/') }}/page/{{ str_slug($post->title_tr) }}/{{$post->id}}/haberi</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>Daily</changefreq>
            <priority>0.80</priority>

        </url>
    @endforeach


</urlset>

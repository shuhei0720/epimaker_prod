<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
    $dt = new \Carbon\Carbon('2022-12-01 00:00:00');
    @endphp
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ $dt->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @foreach ($episodes as $episode)
    <url>
        <loc>{{ url('/') }}/episode/{{ $episode->id }}</loc>
        <lastmod>{{ $episode->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>
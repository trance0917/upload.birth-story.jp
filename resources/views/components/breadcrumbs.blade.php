<!--パンくずリスト-->

@if (count($breadcrumbs))
<ol class="breadcrumbs flex flex-wrap mb-3.75
first:before:[&>li]:content-['\f015']
first:before:[&>li]:mr-0.5
before:[&>li]:content-['\f0da']
before:[&>li]:font-['Font_Awesome_5_Free']
before:[&>li]:font-bold
before:[&>li]:mr-1
before:[&>li]:text-main
[&>li]:text-sm
">
@foreach ($breadcrumbs as $breadcrumb)
@if ($breadcrumb->url && !$loop->last)
<li class="breadcrumb-item mr-1.5"><a class="text-main underline hover:no-underline" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
@else
<li class="breadcrumb-item mr-1.5 active">{{ $breadcrumb->title }}</li>
@endif
@endforeach
</ol>
@endif

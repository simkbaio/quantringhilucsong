<ul class="page-breadcrumb breadcrumb">

    <li>
        <i class="fa fa-home"></i>
        <a href="index.html">
            Trang chủ
        </a>
        <i class="fa fa-angle-right"></i>
    </li>
    <?php
    $total = count($data);
    $i=1;
    ?>
   @foreach($data as $item)
    @if($i !=$total)
    <li>
        <a href="{{$item['title']}}">
            {{$item['title']}}
        </a>
        <i class="fa fa-angle-right"></i>
    </li>
    @else
    <li> Page Layouts</li>
    @endif
    <?php $i++;?>
    @endforeach

</ul>
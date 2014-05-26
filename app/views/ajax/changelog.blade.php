<ul class="list-group">
    <?php
    $i=1;
?>

    @foreach($commits as $commit)
    <?php
        if($i>11){
            break;
        }
    ?>
    <li class="list-group-item"><span class="label label-info">{{$commit->commit->message}}</span>  vào lúc {{date('d-m-Y H:m:s',strtotime($commit->commit->committer->date))}} </li>
    <?php $i++;?>
    @endforeach

</ul>
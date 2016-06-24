<div class="row testimItem">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="testimOwnerBox">
            <h4><?=$data->name?><?=$data->city?', '.$data->city:''?></h4>
            <div class="testimOwnerDetails">
                <div class="dark"><?=$data->selfDate()?></div>
            </div>
        </div>
    </div>
    <div class="col-sm-10 col-md-10 col-lg-10">
        <div class="testimWordsBox">
            <p>
                <?=$data->message?>
            </p>
        </div>
        <? if ($data->reviewsComments){
            foreach($data->reviewsComments as $comment){
            ?>
            <div class="testimWordsBoxComment">
                <h4><?=$comment->name?></h4>
                <p><?=$comment->message?></p>
            </div>
        <? }
        }?>
    </div>
</div>
<div class="social-sharing" style="text-align: center;" data-permalink="http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>">
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-facebook">
        <span class="icon icon-facebook" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>

    <!-- https://dev.twitter.com/docs/intents -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;text=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>&amp;" class="share-twitter">
        <span class="icon icon-twitter" aria-hidden="true"></span>
        <span class="share-title">Tweet</span>
    </a>

    <!--
        https://developers.pinterest.com/pin_it/
        Pinterest get data from the same Open Graph meta tags Facebook uses
    -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;media=<?=@$og_image?>&amp;description=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-pinterest">
        <span class="icon icon-pinterest" aria-hidden="true"></span>
        <span class="share-title">Pin it</span>
    </a>

    <!-- https://developers.google.com/+/web/share/ -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-google">
        <!-- Cannot get Google+ share count with JS yet -->
        <span class="icon icon-google" aria-hidden="true"></span>
        <span class="share-title">+1</span>
    </a>

    <!-- https://developer.linkedin.com/plugins/share -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&title=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-linkedin">
        <span class="icon icon-linkedin" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>

    <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&lang=es-es" class="share-skype">
        <span class="icon icon-skype" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>
</div>
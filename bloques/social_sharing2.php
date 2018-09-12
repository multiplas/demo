<div class="social-sharing2" style="text-align: center; width: 100%; display: ruby-text;" data-permalink="<?= $actual_link ?>">
    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=<?= $actual_link ?>">
        <span class="icon icon-facebook" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>

    <!-- https://dev.twitter.com/docs/intents -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=<?= $actual_link ?>text=%0d&amp;">
        <span class="icon icon-twitter" aria-hidden="true"></span>
        <span class="share-title">Tweet</span>
    </a>

    <!--
        https://developers.pinterest.com/pin_it/
        Pinterest get data from the same Open Graph meta tags Facebook uses
    -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=<?= $actual_link ?>media=&amp;description=%0d">
        <span class="icon icon-pinterest" aria-hidden="true"></span>
        <span class="share-title">Pin it</span>
    </a>

    <!-- https://developers.google.com/+/web/share/ -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=<?= $actual_link ?>/">
        <!-- Cannot get Google+ share count with JS yet -->
        <span class="icon icon-google" aria-hidden="true"></span>
        <span class="share-title">+1</span>
    </a>

    <!-- https://developer.linkedin.com/plugins/share -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?= $actual_link ?>title=%0d">
        <span class="icon icon-linkedin" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>

    <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=<?= $actual_link ?>lang=es-es">
        <span class="icon icon-skype" aria-hidden="true"></span>
        <span class="share-title">Compartir</span>
    </a>
</div>
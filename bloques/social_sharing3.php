<style>
    .metro-height {
    height: 212px;
}
.metro-social {
    padding-top: 10px;
    padding-bottom: 10px;
}
.metro-social .metro-facebook {
    background: url(<?=$draizp?>/logos/facebook.png) no-repeat center center #1f69b3;
    width: 47%;
    height: 140px;
    padding: 0;
}
.metro-social .metro-googleplus {
    background: url(<?=$draizp?>/logos/google.png) no-repeat center center #da4a38;
    width: 23.3%;
    height: 69px;
    padding: 0;
}

.metro-social .metro-twitter {
    background: url(<?=$draizp?>/logos/twitter.png) no-repeat center center #43b3e5;
    width: 23%;
    height: 69px;
    padding: 0;
}
.metro-social .metro-linkedin {
    background: url(<?=$draizp?>/logos/linkedin.png) no-repeat center center #0097bd;
    width: 23%;
    height: 69px;
    padding: 0;
}

.metro-social .metro-pinterest {
    background: url(<?=$draizp?>/logos/pinterest.png) no-repeat center center #d73532;
    width: 23.2%;
    height: 69px;
    padding: 0;
}

.metro-social .rss-feed {
    background: url(<?=$draizp?>/logos/skype.png) no-repeat center center #01aef0;
    width: 95%;
    height: 69px;
    padding: 0;
    background-size: contain;
}

.metro-social li {
    position: relative;
    cursor: pointer;
    list-style: none;
    margin: 1px;
}

.metro-social .metro-facebook, .metro-twitter, .metro-googleplus, .metro-pinterest, .metro-linkedin, .metro-youtube, .metro-rss, .rss-feed, .metro-specific, .googleplus-one, .twitter-one, .linkedin-one, .pinterest-one, .twitter-one-extend, .pinterest-one-extend, .youtube-one, .twitter-extend-one {
    float: left;
    margin: 1px;
    position: relative;
    display: block;
}
</style>
<?php 
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<div class="social-sharing3 metro-social metro-height"> 
    <li>
        <a class="metro-facebook" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=<?=$actual_link?>">
        </a>
    </li> 

    <li>
        <a class="metro-googleplus" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=<?=$actual_link?>">
        </a>
    </li>
        
    <li>
        <a class="metro-twitter" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=<?=$actual_link?>&amp;text=%0d&amp;">
        </a>
    </li>
 
    <li>
        <a class="metro-linkedin" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$actual_link?>&amp;title=%0d">
        </a>
    </li>
 
    <li>
        <a class="metro-pinterest" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=<?=$actual_link?>&amp;media=&amp;description=%0d">
        </a>
    </li>
 
    <li>
        <a class="rss-feed" target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=<?=$actual_link?>&amp;lang=es-es">
        </a>
    </li>
    
   
</div>
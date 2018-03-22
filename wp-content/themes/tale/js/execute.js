
function parallaxScroll(){
    var scrolledY = $(window).scrollTop();
    var scrollBottom = $(window).scrollTop() + $(window).height();

$('.story-right').css('marginTop', '-' +((scrolledY*0.1))+'px');
$('.full-bg').css('transform', 'translate3d(0px, -'+(scrolledY*0.06)+"px"+',0px)');
$('.bg-img').css('transform', 'translate3d(0px,'+(scrolledY*0.06)+"px"+',0px)');
}

function tamingselect()
{
  if(!document.getElementById && !document.createTextNode){return;}
  
// Classes for the link and the visible dropdown
  var ts_selectclass='turnintodropdown_demo2';  // class to identify selects
  var ts_listclass='turnintoselect_demo2';    // class to identify ULs
  var ts_boxclass='dropcontainer_demo2';    // parent element
  var ts_triggeron='activetrigger_demo2';     // class for the active trigger link
  var ts_triggeroff='trigger_demo2';      // class for the inactive trigger link
  var ts_dropdownclosed='dropdownhidden_demo2'; // closed dropdown
  var ts_dropdownopen='dropdownvisible_demo2';  // open dropdown
/*
  Turn all selects into DOM dropdowns
*/
  var count=0;
  var toreplace=new Array();
  var sels=document.getElementsByTagName('select');
  for(var i=0;i<sels.length;i++){
    if (ts_check(sels[i],ts_selectclass))
    {
      var hiddenfield=document.createElement('input');
      hiddenfield.name=sels[i].name;
      hiddenfield.type='hidden';
      hiddenfield.id=sels[i].id;
      hiddenfield.value=sels[i].options[0].value;
      sels[i].parentNode.insertBefore(hiddenfield,sels[i])
      var trigger=document.createElement('a');
      ts_addclass(trigger,ts_triggeroff);
      trigger.href='#';
      trigger.onclick=function(){
        ts_swapclass(this,ts_triggeroff,ts_triggeron)
        ts_swapclass(this.parentNode.getElementsByTagName('ul')[0],ts_dropdownclosed,ts_dropdownopen);
        return false;
      }
      trigger.appendChild(document.createTextNode(sels[i].options[0].text));
      sels[i].parentNode.insertBefore(trigger,sels[i]);
      var replaceUL=document.createElement('ul');
      for(var j=0;j<sels[i].getElementsByTagName('option').length;j++)
      {
        var newli=document.createElement('li');
        var newa=document.createElement('a');
        newli.v=sels[i].getElementsByTagName('option')[j].value;
        newli.elm=hiddenfield;
        newli.istrigger=trigger;
        newa.href='#';
        newa.appendChild(document.createTextNode(
        sels[i].getElementsByTagName('option')[j].text));
        newli.onclick=function(){ 
          this.elm.value=this.v;
          ts_swapclass(this.istrigger,ts_triggeron,ts_triggeroff);
          ts_swapclass(this.parentNode,ts_dropdownopen,ts_dropdownclosed)
          this.istrigger.firstChild.nodeValue=this.firstChild.firstChild.nodeValue;
          return false;
        }
        newli.appendChild(newa);
        replaceUL.appendChild(newli);
      }
      ts_addclass(replaceUL,ts_dropdownclosed);
      var div=document.createElement('div');
      div.appendChild(replaceUL);
      ts_addclass(div,ts_boxclass);
      sels[i].parentNode.insertBefore(div,sels[i])
      toreplace[count]=sels[i];
      count++;
    }
  }
  
/*
  Turn all ULs with the class defined above into dropdown navigations
*/  

  var uls=document.getElementsByTagName('ul');
  for(var i=0;i<uls.length;i++)
  {
    if(ts_check(uls[i],ts_listclass))
    {
      var newform=document.createElement('form');
      var newselect=document.createElement('select');
      for(j=0;j<uls[i].getElementsByTagName('a').length;j++)
      {
        var newopt=document.createElement('option');
        newopt.value=uls[i].getElementsByTagName('a')[j].href;  
        newopt.appendChild(document.createTextNode(uls[i].getElementsByTagName('a')[j].innerHTML)); 
        newselect.appendChild(newopt);
      }
      newselect.onchange=function()
      {
        window.location=this.options[this.selectedIndex].value;
      }
      newform.appendChild(newselect);
      uls[i].parentNode.insertBefore(newform,uls[i]);
      toreplace[count]=uls[i];
      count++;
    }
  }
  for(i=0;i<count;i++){
    toreplace[i].parentNode.removeChild(toreplace[i]);
  }
  function ts_check(o,c)
  {
    return new RegExp('\\b'+c+'\\b').test(o.className);
  }
  function ts_swapclass(o,c1,c2)
  {
    var cn=o.className
    o.className=!ts_check(o,c1)?cn.replace(c2,c1):cn.replace(c1,c2);
  }
  function ts_addclass(o,c)
  {
    if(!ts_check(o,c)){o.className+=o.className==''?c:' '+c;}
  }
}

window.onload=function()
{
  tamingselect();
  // add more functions if necessary
}


function thirty_pc() {
  var height = $(window).height();
  var thirtypc = (100 * height) / 100;
  var fully = (95 * height) / 100;
  var sixty = (70 * height) / 100;
  var seventypcd = (85 * height) / 100;
  var seventypc = (90 * height) / 100;
  var forty = (15 * height) / 100;
  thirtypc = parseInt(thirtypc) + 'px';

       $(".intro-container").css('height',thirtypc);
        $(".full-bg").css('height',fully);

        $(".interior .intro").css('height',sixty);
        $(".interior .full-bg").css('height',seventypcd);
}


var $document = $(document),
    $element = $('body'),
    className = 'hasScrolled';

$document.scroll(function() {
  if ($document.scrollTop() >= 500) {
    // user scrolled 50 pixels or more;
    // do stuff
    $element.addClass(className);
  } else {
    $element.removeClass(className);
  }
});

jQuery(document).ready(function() {
  var $hamburgr = $(".getlogged");
  var $mainbd = $("body");
  $hamburgr.on("click", function(e) {
    e.preventDefault();
    $hamburgr.toggleClass("is-active");
    $mainbd.toggleClass("loginscreen");
  });
});

jQuery(document).ready(function() {
  var $searchable = $(".hamburger");
  var $mainbod = $("body");
  $searchable.on("click", function(e) {
    $searchable.toggleClass("waldo");
    $searchable.toggleClass("is-active");
    $mainbod.toggleClass("navman");
  });
});

$(window).on('load', function(){
    $('#status').fadeOut();
    $(".lining").removeClass("preload");
    $('#preloader').delay(0).fadeOut('slow');

});


$(window).bind('scroll',function(e){
    parallaxScroll();
});





$(document).ready(function() {
	thirty_pc();
	$(window).bind('resize', thirty_pc);

  $(".supernav ul li").hover(function() {
    $(this).siblings().addClass("hovered");
    }, function() {
        $(this).siblings().removeClass("hovered");
    });


    $("#type").change(function () {
        var val = $(this).val();
        if (val == "item1") {
            $("#size").html('<form action="http://cebocampbell.com/" method="get" style="position: relative;"><input name="s" id="search" placeholder="Searching Profiles"><button class="pinutton"></button></form>');
        } else if (val == "item2") {
            $("#size").html('<form action="http://cebocampbell.com/" method="get" style="position: relative;"><input name="s" id="search" placeholder="Searching Photos"><button class="pinutton"></button></form>');
        } else if (val == "item3") {
            $("#size").html('<form action="http://cebocampbell.com/" method="get" style="position: relative;"><input name="s" id="search" placeholder="Searching Profiles"><button class="pinutton"></button></form>');
        }
    });


  $('.post-list').bind('inview', function (event, visible) {
    if (visible == true) {
        $(this).addClass("appear")
      }
  });

  $(".searchbar").stick_in_parent({ offset_top: 50 });
  $(".content").stick_in_parent();


	$(".closeout a").click(function(e){
        e.preventDefault();
        $('body').removeClass('opennav');
        $(".hamburger").removeClass("is-active");
     });

  $(".closeherout").click(function(e){
        e.preventDefault();
        $('body').removeClass('loginscreen');
     });

	$(".foundhim").click(function(e){
        e.preventDefault();
        $('body').removeClass('opensearch');
        $(".searchable").removeClass("waldo");
     });


});


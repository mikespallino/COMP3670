$(document).ready(function () {
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieVars = decodedCookie.split("; ");
    var currentPage = "index";

    console.log(document.cookie);

    for(var i = 0; i < cookieVars.length; i++) {
        if(cookieVars[i].indexOf("curpage=") == 0) {
            currentPage = cookieVars[i].substring(8, cookieVars[i].length);
            console.log(currentPage);
        }
    }

    var indexLink = $("#main-home-link"); 
    var musicLink = $("#music-link");
    var mediaLink = $("#media-link");
    var newsLink = $("#news-link");
    var eventsLink = $("#events-link");
    var shopLink = $("#shop-link");
    
    indexLink.click(index_load);
    musicLink.click(music_load);
    mediaLink.click(media_load);
    newsLink.click(news_load);
    eventsLink.click(events_load);
    shopLink.click(shop_load);
    
    if(currentPage == "index") {
        index_load();
    } else if (currentPage == "music") {
        music_load();
    } else if (currentPage == "media") {
        media_load();
    } else if (currentPage == "news") {
        news_load();
    } else if (currentPage == "events") {
        events_load();
    } else if (currentPage == "shop") {
        shop_load();
    }

    $('#sendContact').on('click', function(e) {
        $('#sendContact').validate();
        e.preventDefault();
        $.ajax({
            url: 'contactus.php',
            data: $('#contactForm').serialize(),
            type: 'POST',
            success: function(result) {
                $('#contactUsModal').modal('hide');
                $('#thanksModal').modal('show');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                $('#contactUsModal').modal('hide');
                $('#errorModal').modal('show');
            }
        });
    });

});

function index_load() {
    window.location = "#";
    set_cookie("curpage", "index");
    var center = $("#center");
    center.innerHTML = "";
    center.load("meet_the_band.html");
}

function music_load() {
    window.location = "#";
    set_cookie("curpage", "music");
    var center = $("#center");
    center.innerHTML = "";
    center.load("music.html");
}

function media_load() {
    window.location = "#";
    set_cookie("curpage", "media");
    var center = $("#center");
    center.innerHTML = "";
    center.load("media.html");
}

function news_load() {
    window.location = "#";
    set_cookie("curpage", "news");
    var center = $("#center");
    center.innerHTML = "";
    center.load("news.html");
}

function events_load() {
    window.location = "#";
    set_cookie("curpage", "events");
    var center = $("#center");
    center.innerHTML = "";
    center.load("events.html");
}

function shop_load() {
    window.location = "#";
    set_cookie("curpage", "shop");
    var center = $("#center");
    center.innerHTML = "";
    center.load("shop.php", function() {
        var shopItems = document.getElementsByClassName('request-button');
        for(var i = 0; i < shopItems.length; i++) {
            var elementId = shopItems[i].getAttribute("id");
            shopItems[i].addEventListener('click', function(e) {
                $('#requestItemModal').modal('show');
                $('#requestItemModal').validate();
                $('#sendItemRequest').on('click', function(e) {
                    var requestedItem = $('#requestForm').serialize();
                    var itemName = document.getElementById(elementId).getAttribute('id').split('-');
                    requestedItem.requestedItem = itemName[0];
                    requestedItem.requestedItemId = itemName[1];
                    e.preventDefault();
                    $.ajax({
                        url: 'requestitem.php',
                        data: requestedItem,
                        type: 'POST',
                        success: function(result) {
                            $('#requestItemModal').modal('hide');
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $('#requestItemModal').modal('hide');
                            $('#errorModal').modal('show');
                        }
                    });
                });
            });
        }
    });
}

function set_cookie(name, value) {
    var exprDate = new Date();
    // 12 hours in the future
    exprDate.setTime(exprDate.getTime() + (12*60*60*1000));
    document.cookie = name + "=" + value  + ";expires=" + exprDate.toUTCString() + ";path=/";
}

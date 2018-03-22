var external_doc_site = "http://mamafus.com",
    tmp_order_link = "http://order.mamafus.com",
    tmp_catering_link = "http://order.mamafus.com",
    mmf_startPos, mmf_geolocation_ok = !1,
    mmf_geoTimeout = 1E4,
    mmf_search_done = !1,
    my_latitude_detected = 0,
    my_longitude_detected = 0,
    my_latitude = 0,
    my_longitude = 0,
    specific_locatopn = 0,
    locations_zip50 = [],
    locations_zip200 = [],
    location_distances = {},
    current_map = null,
    call_center_map = null,
    call_center_marker = null,
    call_center_mmf_markers = [],
    call_center_infoWin = null,
    call_center_no_result_infoWin = null,
    call_center_addr = "",
    my_address = "",
    my_location_marker = null;
jQuery(function() {
    mmf_init()
});
"function" != typeof GLatLng && (window.GLatLng = google.maps.LatLng);

function mmf_init() {
    if ("undefined" == typeof is_call_center) try {
        navigator.geolocation ? navigator.geolocation.getCurrentPosition(mmf_updateLocation, mmf_handleLocationError, {
            timeout: 5E3
        }) : mmf_no_location(), setTimeout(function() {
            mmf_geolocation_ok || mmf_no_location()
        }, mmf_geoTimeout)
    } catch (a) {
        mmf_no_location(), alert(a)
    }
}

function mmf_no_location() {
    mmf_search_done = 1;
    jQuery(".search-info p").html('Location not detected. Please <a href="' + site_url + '/locations">click here  to see locations.</a> Or enter your zip')
}

function mmf_updateLocation(a) {
    mmf_search_done = 1;
    mmf_startPos = a;
    my_latitude_detected = a.coords.latitude;
    my_longitude_detected = a.coords.longitude;
    mmf_geolocation_ok = !0;
    mmf_find_location();
    setTimeout(function() {
        add_detected_location_marker()
    }, 2E3)
}

function mmf_handleLocationError(a) {
    switch (a.code) {
        case 0:
            mmf_updateStatus("There was an error while retrieving your location: " + a.message);
            break;
        case 1:
            mmf_updateStatus("The user prevented this page from retrieving the location.");
            break;
        case 2:
            mmf_updateStatus("The browser was unable to determine your location: " + a.message);
            break;
        case 3:
            mmf_updateStatus("The browser timed out before retrieving the location."), mmf_updateLocation({
                coords: {
                    latitude: 30.406169,
                    longitude: -97.75743
                }
            })
    }
}

function mmf_updateStatus(a) {
    jQuery("#locationdivStatus1").html(a);
    jQuery("#locationdivStatus").html("xxxxxxxx")
}

function mmf_set_location(a) {
    jQuery(".search-info p").html(a)
}

function mmf_find_location() {
    var a = site_url + "/find_location.php",
        b = mmf_startPos.coords.latitude,
        c = mmf_startPos.coords.longitude,
        d = (new Date).getTime();
    jQuery.post(a, {
        lat: b,
        lng: c,
        serial: d
    }, function(a) {
        a = eval("(" + a + ")");
        a.status ? mmf_set_location(a.location) : mmf_no_location()
    }, "text");
    return !1
}

function remember_location(a, b, c) {
    var d = site_url + "/save_location.php",
        e = (new Date).getTime();
    jQuery.post(d, {
        lat: a,
        lng: b,
        address: c,
        serial: e
    }, function(a) {}, "text");
    return !1
}

function find_location_zip() {
    var a = site_url + "/find_location.php",
        b = jQuery("#zipcode").val(),
        c = (new Date).getTime();
    jQuery.post(a, {
        zipcode: b,
        serial: c
    }, function(a) {
        a = eval("(" + a + ")");
        a.status && mmf_set_location(a.location)
    }, "text");
    return !1
}

function add_my_location_marker(a) {
    if (my_location_marker) try {
        my_location_marker.setMap(null), my_location_marker = null
    } catch (b) {}
    my_location_marker = new google.maps.Marker({
        position: new google.maps.LatLng(my_latitude, my_longitude),
        icon: window.stylesheet_directory + "/images/current.png",
        map: a
    })
}

function add_detected_location_marker() {
    current_map && my_latitude_detected && my_latitude_detected != my_latitude && new google.maps.Marker({
        position: new google.maps.LatLng(my_latitude_detected, my_longitude_detected),
        icon: window.stylesheet_directory + "/images/detected.png",
        map: current_map
    })
}

function location_zip2() {
    "undefined" != typeof my_address && 20 < (my_address + "").length ? (geocoder = new google.maps.Geocoder, geocoder.geocode({
        address: my_address
    }, function(a, b) {
        if (b == google.maps.GeocoderStatus.OK) {
            var c = a[0].geometry.location;
            my_latitude = c.lat();
            my_longitude = c.lng();
            remember_location(my_latitude, my_longitude, my_address)
        }
        location_zip()
    })) : location_zip()
}

function location_zip() {
    var a = 12;
    0 == locations_zip50.length && (a = 5);
    var a = {
            center: new google.maps.LatLng(my_latitude, my_longitude),
            zoom: a,
            scrollwheel: !1,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            panControl: !1,
            zoomControl: !1,
            mapTypeControl: !1,
            scaleControl: !1,
            streetViewControl: !1,
            overviewMapControl: !1
        },
        b = new google.maps.Map(document.getElementById("location-map-zip"), a),
        c, d, e = window.stylesheet_directory + "/images/marker";
    add_my_location_marker(b);
    for (a = 0; a < Math.min(5, locations_zip50.length); a++) {
        var f = locations_zip50[a];
        c = new google.maps.Marker({
            position: new google.maps.LatLng(locations[f].lat, locations[f].lon),
            icon: e + (a + 1) + ".png",
            map: b
        });
        d = new google.maps.InfoWindow({
            content: format_infowin_html(f)
        });
        (function() {
            var a = d,
                e = c;
            google.maps.event.addListener(c, "click", function() {
                a.open(b, e)
            })
        })()
    }
    b.mz_marker = "zipsearch";
    current_map = b;
    0 == a && (d = new google.maps.InfoWindow({
        content: no_results_html()
    }), d.open(b, new google.maps.Marker({
        map: b,
        position: new google.maps.LatLng(my_latitude, my_longitude),
        icon: window.stylesheet_directory + "/images/dot.png"
    })))
}

function goto_map_location(a) {
    window.location = site_url + "/location/?lid=" + a
}

function location_specific() {
    var a = specific_location,
        b = {
            center: new google.maps.LatLng(locations[a].lat, locations[a].lon),
            scrollwheel: !1,
            zoom: 12
        },
        c = new google.maps.LatLng(locations[a].lat, locations[a].lon),
        d = new google.maps.Map(document.getElementById("location2-map-specific"), b),
        e = new google.maps.InfoWindow({
            content: format_infowin_html(a)
        }),
        f = new google.maps.Marker({
            position: c,
            map: d,
            icon: window.stylesheet_directory + "/images/marker1.png"
        });
    add_my_location_marker(d);
    d.mz_marker = "specific";
    current_map = d;
    google.maps.event.addListener(f, "click", function() {
        e.open(d, f)
    });
    setTimeout(function() {
        show_delivery_area(a);
        show_catering_area(a)
    }, 500)
}

function order_map() {
    var a = specific_location,
        b = {
            center: new google.maps.LatLng(locations[a].lat, locations[a].lon),
            scrollwheel: !1,
            zoom: 11
        },
        c = new google.maps.LatLng(locations[a].lat, locations[a].lon),
        b = new google.maps.Map(document.getElementById("order-map1"), b);
    b.mz_marker = "order";
    add_my_location_marker(b);
    current_map = b;
    var d = 1,
        e = 50,
        c = "" + a;
    "undefined" != typeof location_distances[c] && (e = .1 + location_distances[c]);
    for (var f in location_distances) c = parseInt(f), location_distances[f] <= e && (c = new google.maps.LatLng(locations[c].lat, locations[c].lon), marker = new google.maps.Marker({
        position: c,
        map: b,
        icon: window.stylesheet_directory + "/images/marker" + d + ".png"
    }), d++);
    setTimeout(function() {
        show_delivery_area(a);
        show_catering_area(a)
    }, 500)
}

function goto_order_location(a) {
    window.location = site_url + "/order-now/?lid=" + a
}

function getDirections(a, b, c) {
    "" != a.inputbox.value && " " != a.inputbox.value && (from = "from: " + a.inputbox.value + " ", fromTo = from + b, eraseCookie("my_loc"), createCookie("my_loc", a.inputbox.value), openWindow("/directions?lid=" + c + "&fromto=" + escape(fromTo), 1100, 950))
}

function getDirectionsFromAddress(a, b, c) {
    "" != a && " " != a && (from = "from: " + a + " ", fromTo = from + b, openWindow("/directions?lid=" + c + "&fromto=" + escape(fromTo), 1100, 550))
}

function show_delivery_area(a) {
    if (current_map)
        if ("object" == typeof current_map.delivery_area && null != current_map.delivery_area) {
            a = current_map.delivery_area;
            for (var b = 0; b < a.length; b++) a[b].setMap(null), a[b] = null;
            current_map.delivery_area = null
        } else if (b = [], "undefined" != typeof locations[a].deliveryAreas) {
        fillColor = "#ff8800";
        for (var c = 0; c < locations[a].deliveryAreas.length; c++) b[c] = new google.maps.Polygon({
            paths: locations[a].deliveryAreas[c],
            strokeColor: fillColor,
            strokeWeight: 2,
            strokeOpacity: .8,
            fillColor: fillColor,
            fillOpacity: .35
        }), b[c].setMap(current_map);
        current_map.delivery_area = b
    }
}

function show_catering_area(a) {
    if (current_map)
        if ("object" == typeof current_map.catering_area && null != current_map.catering_area) {
            a = current_map.catering_area;
            current_map.catering_area = null;
            for (var b = 0; b < a.length; b++) a[b].setMap(null), a[b] = null;
            current_map.catering_area = null
        } else if (b = [], "undefined" != typeof locations[a].cateringAreas) {
        fillColor = "#88ff00";
        for (var c = 0; c < locations[a].cateringAreas.length; c++) b[c] = new google.maps.Polygon({
            paths: locations[a].cateringAreas[c],
            strokeColor: fillColor,
            strokeWeight: 2,
            strokeOpacity: .8,
            fillColor: fillColor,
            fillOpacity: .35
        }), b[c].setMap(current_map);
        current_map.catering_area = b
    }
}

function animate_target() {
    mmf_search_done || (jQuery(".search-info .dots").html("."), jQuery(".search-info").animate({
        opacity: .7
    }, 300, function() {
        jQuery(".search-info").css("background-image", "url(" + window.stylesheet_directory + "/images/target-ico0.png)");
        jQuery(".search-info .dots").html("..");
        jQuery(".search-info").animate({
            opacity: 1
        }, 400, function() {
            jQuery(".search-info").css("background-image", "url(" + window.stylesheet_directory + "/images/target-ico.png)");
            jQuery(".search-info .dots").html("...");
            mmf_search_done || setTimeout(function() {
                animate_target()
            }, 500)
        })
    }))
}

function createCookie(a, b, c) {
    if (c) {
        var d = new Date;
        d.setTime(d.getTime() + 864E5 * c);
        c = "; expires=" + d.toGMTString()
    } else c = "";
    document.cookie = a + "=" + b + c + ";path=/"
}

function readCookie(a) {
    a += "=";
    for (var b = document.cookie.split(";"), c = 0; c < b.length; c++) {
        for (var d = b[c];
            " " == d.charAt(0);) d = d.substring(1, d.length);
        if (0 == d.indexOf(a)) return d.substring(a.length, d.length)
    }
    return null
}

function eraseCookie(a) {
    createCookie(a, "", -1)
}

function openWindow(a, b, c) {
    day = new Date;
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "',''");
    return !1
}

function menu_link(a) {
    a = locations[a].menu;
    return a.match(/^http/) ? a : external_doc_site + a
}

function catering_menu_link(a) {
    a = locations[a].catering;
    return a.match(/^http/) ? a : external_doc_site + a
}

function encode_url(a) {
    return window.encodeURIComponent ? encodeURIComponent(a) : escape(a)
}

function get_direction_link(a) {
    return "https://maps.google.com/maps?q=" + encode_url(locations[a].address) + "&t=m&z=13"
}

function format_infowin_html(a) {
    var b = locations[a].address.split(","),
        c = b.length,
        d = b.slice(0, c - 2),
        b = b.slice(c - 2, 2),
        d = d.join(","),
        b = b.join(","),
        c = "" + a,
        e = '<div class="infowin lists">';
    "undefined" != typeof location_distances[c] && (e += "<p>" + location_distances[c].toFixed(2) + " miles</p>");
    e += '\t<div class="list">\t\t\t<div class="post">\t\t\t\t<div class="entry"><h5>' + locations[a].friendlyName + "</h5><p>" + d + "<br />" + b + "</p><p>" + locations[a].phone + '</p>\t\t\t\t</div>\t\t\t\t<a target="_blank" href="' + get_order_link(a) + '" class="orange-btn short">Order Pickup/Delivery</a>\t\t\t</div>\t\t\t<p class="pt1em"><a target="_blank" href="' + get_direction_link(a) + '">Get Directions </a></p>\t\t\t<p>';
    22 < ("" + menu_link(a)).length && (e += '<a href="' + menu_link(a) + '" target="_blank">Download Menu </a><br />');
    22 < ("" + catering_menu_link(a)).length && (e += ' <a href="' + catering_menu_link(a) + '">Download Catering Menu </a>');
    e += '</p>\t\t</div> \t\t<div class="list">\t\t\t<div class="post">\t\t\t\t<h5>Hours</h5>\t\t\t   <p>' + locations[a].hours + "</p>";
    "undefined" != typeof locations[a].deliveryAreas && (e += '\t\t      <p><a href="javascript:void(0)" onclick="show_delivery_area(' + a + ')" class="delivery-link">Delivery Area</a><br />');
    "undefined" != typeof locations[a].cateringAreas && (e += '\t\t         <a href="javascript:void(0)" onclick="show_catering_area(' + a + ')" class="catering-link">Catering Area</a></p>');
    e += '\t\t\t\t<a href="' + get_catering_link(a) + '" class="orange-btn short">Order Catering Pickup/Delivery</a>\t\t\t</div>\t\t\t<div class="direction-icons">';
    locations[a].wifi_alt && (e += '<a href="#"><img src="' + window.stylesheet_directory + '/images/range-ico.png" alt="" /><span>Wifi</span></a>');
    locations[a].delivery_alt && (e += '<a href="#"><img src="' + window.stylesheet_directory + '/images/truck-ico.png" alt="" /><span>Delivery</span></a>');
    locations[a].alcohol && (e += '<a href="#"><img src="' + window.stylesheet_directory + '/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>');
    locations[a].catering && (e += '<a href="#"><img src="' + window.stylesheet_directory + '/images/food-ico.png" alt="" /><span>Catering</span></a>');
    return e + "\t\t\t</div>\t\t</div></div>"
}

function no_results_html() {
    return '<div class="infowin lists">\t<div class="list">\t\t\t<div class="post">\t\t\t\t<div class="entry"><p class="pink">We are sorry. No locations were found near your zipcode. Please click below to see a list of all locations sort by state.</p>\t\t\t\t</div>\t\t\t\t<a href="' + site_url + '/locations/" class="orange-btn short">View Locations</a>\t\t\t</div>\t\t</div> \t</div></div>'
}

function call_center_no_results_html() {
    return '<div class="infowin lists">\t<div class="list">\t\t\t<div class="post">\t\t\t\t<div class="entry"><p class="pink">It seems the address is out of our delivery zone. <br>The 3 nearest Mamafus location is shown, please double check.</p>\t\t\t\t</div>\t\t\t</div>\t\t</div> \t</div></div>'
}

function call_center_format_infowin_html(a) {
    var b = locations[a].address.split(","),
        c = b.length,
        d = b.slice(0, c - 2),
        b = b.slice(c - 2, 2),
        d = d.join(","),
        b = b.join(","),
        c = '<div class="infowin lists">';
    "undefined" != typeof locations[a].distance && (c += "<p>" + locations[a].distance.toFixed(2) + " miles (direct distance)</p>");
    c += '\t<div class="list">\t\t\t<div class="post">\t\t\t\t<div class="entry"><h5>' + locations[a].friendlyName + "</h5><p>" + d + "<br />" + b + "</p><p>" + locations[a].phone + '</p>\t\t\t\t</div>\t\t\t</div>\t\t</div> \t\t<div class="list">\t\t\t<div class="post">\t\t\t\t<h5>Hours</h5>\t\t\t   <p>' + locations[a].hours + "</p>";
    "undefined" != typeof locations[a].deliveryAreas && (c += '\t\t      <p><a href="javascript:void(0)" onclick="cc_show_delivery_area(' + a + ')" class="delivery-link">Delivery Area</a><br />');
    "undefined" != typeof locations[a].cateringAreas && (c += '\t\t         <a href="javascript:void(0)" onclick="cc_show_catering_area(' + a + ')" class="catering-link">Catering Area</a></p>');
    c += '\t\t\t</div>\t\t\t<div class="direction-icons">';
    locations[a].wifi_alt && (c += '<a href="#"><img src="' + window.stylesheet_directory + '/images/range-ico.png" alt="" /><span>Wifi</span></a>');
    locations[a].delivery_alt && (c += '<a href="#"><img src="' + window.stylesheet_directory + '/images/truck-ico.png" alt="" /><span>Delivery</span></a>');
    locations[a].alcohol && (c += '<a href="#"><img src="' + window.stylesheet_directory + '/images/beer-ico.png" alt="" /><span>Happy Hour</span></a>');
    locations[a].catering && (c += '<a href="#"><img src="' + window.stylesheet_directory + '/images/food-ico.png" alt="" /><span>Catering</span></a>');
    return c + "\t\t\t</div>\t\t</div></div>"
}

function distance2(a, b, c, d) {
    var e;
    e = .017453292519943278 * (a - c);
    b = .017453292519943278 * (b - d);
    a = Math.sin(.5 * e) * Math.sin(.5 * e) + Math.cos(.017453292519943278 * a) * Math.cos(.017453292519943278 * c) * Math.sin(.5 * b) * Math.sin(.5 * b);
    a = 7912.174214206098 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return a + a
}

function call_center_search() {
    var a = jQuery("#geoaddr").val();
    call_center_addr != a && (call_center_addr = a, "undefined" != typeof a && 5 <= (a + "").length && (geocoder = new google.maps.Geocoder, geocoder.geocode({
        address: a
    }, function(b, c) {
        if (c == google.maps.GeocoderStatus.OK) {
            var d = b[0].geometry.location;
            call_center_lat = d.lat();
            call_center_lng = d.lng();
            show_call_center_marker();
            call_center_map.setOptions({
                center: d
            });
            call_center_find_mmfs(d)
        } else alert("Geocoder couldn't find: " + a + " The reason was: " + c)
    })));
    return !1
}

function show_call_center_map() {
    var a = {
        center: new google.maps.LatLng(call_center_lat, call_center_lng),
        scrollwheel: !0,
        zoom: 12
    };
    new google.maps.LatLng(call_center_lat, call_center_lng);
    call_center_map = new google.maps.Map(document.getElementById("call-center-map"), a);
    show_call_center_marker();
    a = jQuery("#geoaddr").get(0);
    a = new google.maps.places.Autocomplete(a);
    a.bindTo("bounds", call_center_map);
    google.maps.event.addListener(a, "place_changed", function() {
        call_center_search()
    })
}

function show_call_center_marker() {
    var a = call_center_map;
    if (call_center_marker) try {
        call_center_marker.setMap(null), call_center_marker = null
    } catch (b) {}
    call_center_marker = new google.maps.Marker({
        position: new google.maps.LatLng(call_center_lat, call_center_lng),
        icon: window.stylesheet_directory + "/images/detected.png",
        map: a
    })
}

function call_center_find_mmfs(a) {
    var b, c, d = 99999,
        e = [],
        f = null;
    for (b = 0; b < locations.length; b++) c = distance2(call_center_lat, call_center_lng, locations[b].lat, locations[b].lon), locations[b].distance = c, c < d && (d = c), e[b] = {
        dist: c,
        idx: b
    };
    e.sort(function(a, b) {
        return a.dist - b.dist
    });
    c = -1;
    var k = call_center_map;
    for (b = 0; 3 > b; b++) {
        if ("undefined" != typeof call_center_mmf_markers[b] && null != call_center_mmf_markers[b]) try {
            call_center_mmf_markers[b].setMap(null), call_center_mmf_markers[b] = null
        } catch (m) {}
        var g = e[b].idx;
        a = locations[g].deliveryAreas;
        if ("undefined" != typeof a)
            for (var h = 0; h < a.length && -1 == c; h++) in_ploygon(a[h], call_center_lat, call_center_lng) && (c = b)
    } - 1 == c && (c = 0, f = new google.maps.InfoWindow({
        content: call_center_no_results_html()
    }));
    for (b = 0; 3 > b; b++) {
        g = e[b].idx;
        a = new google.maps.LatLng(locations[g].lat, locations[g].lon);
        call_center_mmf_markers[b] = new google.maps.Marker({
            position: a,
            icon: window.stylesheet_directory + "/images/marker" + (b + 1) + ".png",
            map: k
        });
        var l = new google.maps.InfoWindow({
            content: call_center_format_infowin_html(g)
        });
        b == c && (call_center_close_infoWin(), null != f ? (f.open(k, call_center_marker), call_center_infoWin = f) : (l.open(k, call_center_mmf_markers[b]), call_center_infoWin = l), cc_clear_areas(), cc_show_delivery_area(g), call_center_map.setOptions({
            center: a
        }));
        (function() {
            var a = g,
                c = l,
                d = call_center_mmf_markers[b];
            google.maps.event.addListener(call_center_mmf_markers[b], "click", function() {
                call_center_close_infoWin();
                c.open(k, d);
                call_center_infoWin = c;
                cc_clear_areas();
                cc_show_delivery_area(a)
            })
        })()
    }
    k.setZoom(1E3 < d ? 5 : 100 <= d ? 8 : 50 <= d ? 9 : 25 <= d ? 10 : 15 <= d ? 11 : 12)
}

function in_ploygon(a, b, c) {
    var d, e;
    d = 0;
    e = a.length;
    for (var f = 0; f < e; f++) {
        var k = a[f].lat(),
            m = a[f].lng(),
            g, h;
        f < e - 1 ? (g = a[f + 1].lat(), h = a[f + 1].lng()) : (g = a[0].lat(), h = a[0].lng());
        intersect_line(b, c, 88, 178, k, m, g, h) && d++
    }
    return d & 1 ? 1 : 0
}

function intersect_line(a, b, c, d, e, f, k, m) {
    var g = c - a,
        h = b - d,
        l = k - e,
        n = f - m,
        p = g * n - l * h,
        q = 0;
    if (1E-12 < Math.abs(p)) {
        var r = g * b + h * a,
            s = l * f + n * e,
            g = (g * s - l * r) / p,
            h = (n * r - h * s) / p;
        in_between(a, b, c, d, g, h) && in_between(e, f, k, m, g, h) && (q = 3)
    } else 1E-12 > Math.abs((a - e) * (d - f) - (c - e) * (b - f)) && (in_between(a, b, c, d, e, f) || in_between(a, b, c, d, k, m)) && (q = 1);
    return 0 != q
}

function in_between(a, b, c, d, e, f) {
    if (e == a && f == b) return 1;
    if (e != c || f != d)
        if (a < c ? e >= a && e <= c : e >= c && e <= a) return b < d ? f >= b && f <= d : f >= d && f <= b;
    return 0
}

function call_center_close_infoWin() {
    if (call_center_infoWin) try {
        call_center_infoWin.close()
    } catch (a) {}
    call_center_infoWin = null
}

function cc_clear_areas() {
    if ("object" == typeof call_center_map.delivery_area && null != call_center_map.delivery_area) {
        for (var a = call_center_map.delivery_area, b = 0; b < a.length; b++) a[b].setMap(null), a[b] = null;
        call_center_map.delivery_area = null
    }
    if ("object" == typeof call_center_map.catering_area && null != call_center_map.catering_area) {
        a = call_center_map.catering_area;
        call_center_map.catering_area = null;
        for (b = 0; b < a.length; b++) a[b].setMap(null), a[b] = null;
        call_center_map.catering_area = null
    }
}

function cc_show_delivery_area(a) {
    if (call_center_map)
        if ("object" == typeof call_center_map.delivery_area && null != call_center_map.delivery_area) {
            a = call_center_map.delivery_area;
            for (var b = 0; b < a.length; b++) a[b].setMap(null), a[b] = null;
            call_center_map.delivery_area = null
        } else if (b = [], "undefined" != typeof locations[a].deliveryAreas) {
        fillColor = "#ff8800";
        for (var c = 0; c < locations[a].deliveryAreas.length; c++) b[c] = new google.maps.Polygon({
            paths: locations[a].deliveryAreas[c],
            strokeColor: fillColor,
            strokeWeight: 2,
            strokeOpacity: .8,
            fillColor: fillColor,
            fillOpacity: .35
        }), b[c].setMap(call_center_map);
        call_center_map.delivery_area = b
    }
}

function cc_show_catering_area(a) {
    if (call_center_map)
        if ("object" == typeof call_center_map.catering_area && null != call_center_map.catering_area) {
            a = call_center_map.catering_area;
            call_center_map.catering_area = null;
            for (var b = 0; b < a.length; b++) a[b].setMap(null), a[b] = null;
            call_center_map.catering_area = null
        } else if (b = [], "undefined" != typeof locations[a].cateringAreas) {
        fillColor = "#88ff00";
        for (var c = 0; c < locations[a].cateringAreas.length; c++) b[c] = new google.maps.Polygon({
            paths: locations[a].cateringAreas[c],
            strokeColor: fillColor,
            strokeWeight: 2,
            strokeOpacity: .8,
            fillColor: fillColor,
            fillOpacity: .35
        }), b[c].setMap(call_center_map);
        call_center_map.catering_area = b
    }
}
jQuery(window).on("load", function() {
    jQuery("#location-map-zip").length && location_zip2();
    jQuery("#location2-map-specific").length && location_specific();
    jQuery("#order-map1").length && order_map();
    jQuery(".states-select").change(function() {
        var a = jQuery(".states-select").val();
        window.location = site_url + "/locations/?state=" + a
    });
    jQuery(".search-info .dots").length && animate_target();
    jQuery("#call-center-map").length && (jQuery("#call-center-map").css({
        height: jQuery(window).height() - 110 + "px"
    }), show_call_center_map(), jQuery(window).on("resize", function() {
        jQuery("#call-center-map").css({
            height: jQuery(window).height() - 110 + "px"
        })
    }))
});

function get_catering_link(a) {
    return tmp_catering_link
}

function get_order_link(a) {
    return tmp_order_link
};
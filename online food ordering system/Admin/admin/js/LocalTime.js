//declare variable : year month date hours minutes seconds day
function showLocale(objD) {
    let str,colorhead,colorfoot
    let yy = objD.getYear()
    if (yy < 1900) yy = yy + 1900

    let MM = objD.getMonth()+1
    if (MM < 10) MM = '0' + MM

    let dd = objD.getDate()
    if (dd < 10) dd = '0' + dd

    let hh = objD.getHours()
    if (hh < 10) hh = '0' + hh

    let mm = objD.getMinutes()
    if (mm < 10) hh = '0' + mm

    let ss = objD.getSeconds()
    if (ss < 10) hh = '0' + ss

    let ww = objD.getDay()
    if (ww == 0) colorhead = "<font color=\"#FF0000\">"
    if (ww > 0 && ww < 6) colorhead = "<font color=\"#373737\">"
    if (ww == 6) colorhead = "<font color=\"#000000\">"
    if (ww == 0) ww = "Sunday"
    if (ww == 1) ww = "Monday"
    if (ww == 2) ww = "Tuesday"
    if (ww == 3) ww = "Wednesday"
    if (ww == 4) ww = "Thursday"
    if (ww == 5) ww = "Friday"
    if (ww == 6) ww = "Saturday"
    colorfoot = "</font>"

    //string output like: yuar-month-date|hours:minutes:seconds(Days)
    str = colorhead + yy + "-" + MM + "-" + dd + "|" + hh + ":" + mm + ":" + ss + "(" + ww + ")" +colorfoot
    //alert(str)
        return str
}

//Set Timer
function tick() {
    let today = new Date()
    document.getElementById("localtime").innerHTML = showLocale(today)
    window.setTimeout("tick()", 1000)
}

//call function tick()
tick()

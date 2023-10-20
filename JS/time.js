setInterval(function () {
    const d = new Date();
    let h = d.getHours();
    h = ("0"+ h).slice(-2);
    let m = d.getMinutes();
    m = ("0"+ m).slice(-2);
    let s = d.getSeconds();
    s = ("0"+ s).slice(-2);
    let time = h+":"+m+":"+s;
    document.getElementById("date").innerHTML = time;
}, 500)
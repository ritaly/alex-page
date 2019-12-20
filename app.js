let dataURL = '//www.flynerd.pl/alex/sp/alex-siepomaga.php'

let request = new XMLHttpRequest()

function getStats() {
    request.open('GET', dataURL, true)
    request.onload = function() {
        let data = JSON.parse(this.response)

        if (request.status >= 200) {
            document.getElementById("amount").innerHTML = data[0].amount;
            document.getElementById("goal").innerHTML = data[0].goal;
            document.getElementById("progressbar").setAttribute("aria-valuenow", data[0].percentage);
            document.getElementById("progressbar").setAttribute("style", "width: " + data[0].percentage + "%");
            document.getElementById("tooltip").setAttribute("data-original-title", data[0].percentage + "%");
            $(function() {
                $('[data-toggle="tooltip"]').tooltip({
                    trigger: 'manual',
                    title: data[0].percentage + "%"
                }).tooltip('show');
            });
        } else {
            console.log('error')
        }
    }

    request.send();
}
getStats();

let i = setInterval(function() {
    getStats();
}, 12000);

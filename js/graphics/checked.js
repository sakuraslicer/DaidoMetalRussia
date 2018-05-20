$(document).ready(function(){
    $.ajax({
        url: "http://daidometalchecksystem/control/graphics/checked.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var geo = [];
            var count_of_query = [];
            var coloR = [];

            var dynamicColors = function() {
               var r = Math.floor(Math.random() * 255);
               var g = Math.floor(Math.random() * 255);
               var b = Math.floor(Math.random() * 255);
               return "rgb(" + r + "," + g + "," + b + "," + "0.75" + ")";
            };

            for(var i in data){
                geo.push(data[i].geo);
                count_of_query.push(data[i].count_of_query);
                coloR.push(dynamicColors());
            }

            var chardata = {
                labels: geo,
                datasets : [
                    {
                        label: 'Повторных проверок',
                        backgroundColor: coloR,
                        borderColor: 'rgba(0, 0, 0, 0.75)',
                        pointBorderColor: 'black',
                        pointBackgroundColor: 'rgba(255, 255, 255, 0.5)',
                        pointRadius: 5,
                        pointHoverRadius: 10,
                        pointHitRadius: 30,
                        pointBorderWidth: 2,
                        pointStyle: 'rectRounded',
                        data: count_of_query
                    }
                ]
            };

            var ctx = $("#checked");

            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: chardata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});

function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
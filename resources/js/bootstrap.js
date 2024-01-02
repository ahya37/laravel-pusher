window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

window.Echo.channel("messages").listen("MessageCreated", (event) => {
    const array = event.message;
    // updateData(array);
    initChart(array)
    
});

// Get the canvas element
    
// Create the bar chart
// Chart configuration
let backgroundColor =   [
    'rgb(255, 99, 132)',
    'rgb(75, 192, 192)',
    'rgb(255, 205, 86)',
  ];

function getFirstInitialData(){
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        url:'/data/get',
        method:"POST",
        cache:false,
        data:{
            _token: CSRF_TOKEN
        },
        success:function(data){
            let newData = {
                labels: data.labels,
                datasets: dataSets(data)
            };

             // upadate the chart data
            myChart.data = newData;
            myChart.update();

        }
    });

}
let options = {
    scales: {
        y: {
            beginAtZero: true
        }
    }
};
let initialData = {
    labels: [],
    datasets: dataSets([])
}


let ctx = document.getElementById('myChart').getContext('2d');

let myChart = new Chart(ctx, {
    type: 'bar',
    data: initialData,
    options: options
});

getFirstInitialData();

function initChart(array){
    let newData = {
        labels: array.labels,
        datasets: dataSets(array)
    };

    // upadate the chart data
    myChart.data = newData;
    myChart.update();
}

function dataSets(array){
    let datasets = [
        {
            label: 'Target',
            backgroundColor:'rgba(245, 101, 101, 0.8)',
            data: array.data ?? [],
        },
        {
            label: 'Anggota',
            backgroundColor:'rgba(86, 175, 245, 0.8)',
            data: array.data ?? [],
        },
        {
            label: 'Perolehan Suara',
            backgroundColor:'rgba(92, 222, 111, 0.8)',
            data: array.data ?? [],
        }
    ];

    return datasets;
}
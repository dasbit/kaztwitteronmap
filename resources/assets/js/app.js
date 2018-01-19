
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('googlemaps-with-markers', require('./components/GoogleMapsWithMarkers.vue'));

/**
* Importing package components
*/

const app = new Vue({
    el: '#app',
    data() {
    	return {
    		markers: [],
    	}
    },
    mounted() {
        this.startTweetsFetching();
    },
    methods: {
        startTweetsFetching() {
            this.fetchTweets();
            setInterval(this.fetchTweets, 180000);
        },
        fetchTweets() {
            axios.get('/api/tweets')
                .then((response) => {
                    let new_markers = [];
                    response.data.forEach((tweet) => {
                        new_markers.push({
                                id: tweet.tweet_id,
                                title: tweet.user_name,
                                title_link: tweet.user_link,
                                icon: tweet.user_icon,
                                content: tweet.text,
                                content_link: tweet.link,
                                position: {lat: parseFloat(tweet.latitude), lng: parseFloat(tweet.longitude)}
                        });
                    });
                    this.markers = new_markers;
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    }
});

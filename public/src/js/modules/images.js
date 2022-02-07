const images = () => {
    const axios = require('axios');
    const loginBg = document.querySelector('.login-bg');

    const getImages = () => {
        axios({
            method: 'get',
            url: ' https://api.unsplash.com/search/photos?query=bulgaria&client_id=1i5C0LviD_a001lefMo6louG_erGP98yczbOn2IPZgQ',
        }).then(response => {
            if(response.status === 200) {
                try {
                    loginBg.style.backgroundImage = `url(${response.data.results[Math.floor(Math.random() * 10)].urls.regular})`;
                } catch(e) {}
            }
        }).catch(function (error) {
            console.log(error);
        });;
    }

    getImages();

};

export default images;
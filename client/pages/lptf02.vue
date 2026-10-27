<template>
  <div>
    <div class="container announcement">
        <div class="row">
            <div class="col-lg-12">
                <div class="vaccines" v-for="announcement in announcementlist" :key="announcement.id">
                    <p> <span v-html="announcement.text"></span></p>
                </div>
            </div>
        </div>
    </div> 
     <div class="container slide-slider">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div id="homeSlider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#homeSlider" v-for="(slider, index) in sliderList" :key="index" :data-slide-to="index" ></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item" v-for="(slider, index) in sliderList" :key="index" :class="{ active: index == 0 }">
                            <a :href="slider.link">
                                <img class="d-block w-100" :src="`/assets/images/slider/${slider.path}`" alt="First slide">
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#homeSlider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#homeSlider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container feature">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img :src="`/assets${details.feature}`" width="100%" />
            </div>
        </div>
    </div>
    <div class="container promotion">
        <div class="row">
            <div class="col-lg-12 mt-2" v-for="banner in bannerList" :key="banner.id">
                <img :src="`/assets/images/banner/${banner.path}`" alt="promotion" data-toggle="modal" :data-target="`.banner-${banner.id}`" width="100%" />
            </div>
        </div>
    </div>
    <div class="container freetrial">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img class="d-block w-100" :src="`/assets${details.freetrial}`" width="100%" />
                <div class="col-sm-3 free_trial float-right">
                    <a :href="details.btn_link">
                        <img :src="`/assets${details.freetrial_btn}`" width="100%" class="img"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container reasons">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img :src="`/assets${details.reasons}`" width="100%" />
            </div>
        </div>
    </div>
    <div class="container programs">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img :src="`/assets${details.programs}`" width="100%" />
            </div>
        </div>
    </div>
    <div class="container freetrial2">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img :src="`/assets${details.freetrial2}`" width="100%" />
                <div class="col-sm-3 free_trial_2 float-right">
                    <a :href="details.btn_link">
                        <img :src="`/assets${details.btn}`" width="100%" class="img"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container campus">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img :src="`/assets${details.campus}`" width="100%" />
            </div>
        </div>
        <div class="row ytlink">
            <template v-for="(video, index) in details.videos">
                <div class="col-md-12 col-xl-6 video" :key="`${index}`">
                    <iframe-src :ytlink="video" />
                </div>
            </template>
        </div>
    </div>
    <div class="container transfer">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img :src="`/assets${details.transfer}`" width="100%" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 download_form">
                <img :src="`/assets${details.transfer_btn}`" width="18%" class="img" data-toggle="modal" data-target="#downloadModal" />
            </div>
        </div>
    </div>
    <div class="container contact">
        <div class="row mt-3" id="contact">
            <div class="col-md-12">
                <form v-on:submit.prevent="onSubmit" method="post">
                    <h4 class="contactText mb-4">{{ details.contact.title }}</h4>
                    <div class="col-md-10 form">
                    <paragraph v-if="details.contact.details" :desc="details.contact.details" />
                        <form-handler :formInfos="details.contact.form" ref="refForm"/>
                    
                        <template v-if="isLoading">
                        <button class="btn btn-success btn-block" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                        </template>
                        <template v-else>
                            <div class="col-md-12 reason">
                                <input type="image" :src="`/assets${details.contact.image}`" width="20%" border="0" alt="Submit" class="img" />
                            </div>
                        </template>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-3 link">
            <div class="col-md-12">
                <a href="https://mliesl.edu/">
                    <h4>{{ details.link_title }} <i class="bi bi-arrow-right"></i></h4>
                </a>
            </div>
        </div>
    </div>
    <div class="container footer">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <img src="/assets/images/lptf/footer.jpg" width="100%"/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row social">
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <a href="https://www.facebook.com/MentorLanguageInstitute/">
                    <img src="/assets/images/lptf/fb_sns.png" width="90%" class="img1 mb-1"/>
                </a>
                <a href="https://www.instagram.com/mentorlanguageinstitute/">
                    <img src="/assets/images/lptf/ig_sns.png" width="90%" class="img1 mb-1"/>
                </a>
                <a href="https://twitter.com/mlibh">
                    <img src="/assets/images/lptf/twitter_sns.png" width="35%" class="img2"/>
                </a>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    
    <template>
        <div id="downloadModal" class="modal fade modalbanner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 style="text-align: center;">DOWNLOAD TRANSFER FORM</h3>
                        <div class="container col-md-12 ml-5">
                            <a href="/documents/forms/Transfer Form - Westwood 2022.pdf"><button type="button" class="col-lg-5 btn btn-primary">Westwood</button></a>
                            <a href="/documents/forms/Transfer Form - Hollywood 2022.pdf"><button type="button" class="col-lg-5 btn btn-primary">Hollywood</button></a>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button style="margin-right:15px;" type="button" class="btn gray btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
    </template>
    <template v-for="banner in bannerList">
        <div :key="banner.id" class="modal fade modalbanner" :class="`banner-${banner.id}`" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="banner-large">
                        <img :src="`/assets/images/banner/${banner.image_large}`" alt="banner" width="100%" :usemap="`#banner-map-${banner.id}`" />
                        <map :name="`banner-map-${banner.id}`">
                            <area v-for="(attr, attr_id) in banner.banner_attr" :key="`banner_attr-${banner.id}-${attr_id}`" :target="(attr.url.indexOf('http') != -1 || attr.url.indexOf('www') != -1) ? '_blank' : '_self'" :href="attr.url" :coords="attr.coordinates" shape="rect">
                        </map>
                    </div>
                    <div class="banner-small mb-5">
                        <img class="banner-small mb-4" :src="`/assets/images/banner/${banner.image_small}`" alt="banner" width="100%" />
                        <div v-for="(attr, attr_id) in banner.banner_attr" class="px-2" :key="`banner_buttons-${banner.id}-${attr_id}`">
                            <template v-if="attr.name">
                                <a class="btn btn-primary btn-block px-2 mt-3 text-center" :target="(attr.url.indexOf('http') != -1 || attr.url.indexOf('www') != -1) ? '_blank' : '_self'" :style="`background-color: ${attr.color}`" :href="attr.url"><span v-html="attr.name"></span></a>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
  </div>
</template>

<script>
	import helpers from '../plugins/helpers.js';
    export default {
		layout: 'lptf',
        async asyncData({ $content, $axios }) {
        const details = await $content(`lptf02/en`).fetch();
			return {
				$axios,
				details,
			}
		},
		data() {
			return {
				sliderList: [],
				bannerList: [],
				announcementlist : [],
                isLoading: false,
			}
		},
        mounted() {
        helpers.setToken('utm_source', this.$route.query.utm_source);
        },
		created() {
			this.$axios.$get(`/get_home_info/en`).then((response) => {
				this.sliderList = response.slider_list;
				this.bannerList = response.banner_list;
				this.announcementlist = response.announcement;
			});
		},
		head() {
			if(this.details) {
				return {
					title: this.details.pageTitle,
					meta: [
						{
						hid: 'description',
						name: 'description',
						content: this.details.pageDescription
						}
					],
				}
			}
		},
        methods: {
        async onSubmit(e) {
            e.preventDefault();
            this.isLoading = true;
            const dataFields = Object.assign({}, this.$refs.refForm.formdata);
                dataFields.language = this.lang;
                dataFields.message = dataFields.message == null ? '' : dataFields.message;
                dataFields.phone_call = !dataFields.phone_call ? false : true;
                dataFields.utm_source = helpers.getToken('utm_source');

            await this.$axios.post('/api/lptf', dataFields).then(function(response) {
            this.isLoading = false;
            window.location.href = '/trlp-thanks';
            }.bind(this));
        }
        }
    }
</script>
<style lang="scss" scoped>
.vaccines {
  border: 1px solid #5AACEC;
  box-sizing: border-box;
  border-radius: 6px;
  padding: 20px;
}
.social {
    margin-top: -170px;
}
.ytlink {
    margin-left: 85px;
    margin-top: -300px;
}
.video {
    max-width: 45%;
    text-align: center;
    padding: 0px 50px;
}
.link{
    text-align: center !important;
}
.download_form {
    margin-left: 80px;
    margin-top: -180px;
}
.free_trial{
    margin-top: -170px;
    margin-right: 50px;
    text-align: center;
}
.free_trial_2{
    margin-top: -100px;
    margin-right: 50px;
    text-align: center;
}
.img {
-moz-transition: all 0.5s;
-webkit-transition: all 0.5s;
transition: all 0.5s;
}
.img:hover {
    -webkit-transform: scale(1.06);
    -moz-transform: scale(1.06);
    -o-transform: scale(1.06);
    -ms-transform: scale(1.06);
    transform: scale(1.06);
}
.contactText{
    text-align: center;
    padding: 10px;
    font-size: 2rem;
    color: #005193;
}
.form{
    align-content: center;
    margin: 0 80px;
}
.footer {
    margin-bottom: -50px;
}
.modal-dialog {
    max-width: 950px;
}
.modalbanner {
	.banner-large {
		display: none;
	}
	.banner-small {
		display: block;
	}
}
@media only screen and (max-width: 391px){
    
    .download_form {
        margin-left: 25px;
        margin-top: -65px;
    }
    .free_trial{
        margin-top: -50px;
        margin-right: 25px;
        text-align: center;
        max-width: 25%;
    }
    .free_trial_2{
        margin-top: -30px;
        margin-right: 25px;
        text-align: center;
        max-width: 25%;
    }

}
@media only screen and (min-width: 392px) and (max-width: 480px){
    
    .download_form {
        margin-left: 40px;
        margin-top: -70px;
    }
    .free_trial{
        margin-top: -60px;
        margin-right: 25px;
        text-align: center;
        max-width: 25%;
    }
    .free_trial_2{
        margin-top: -38px;
        margin-right: 25px;
        text-align: center;
        max-width: 25%;
    }
}
@media only screen and (max-width: 399px){

    .social {
        img{
            display: flex;
        }
        margin-top: -65px;
        margin-left: 180px;
        .img1{
            width: 50%;
        }
        .img2{
            width: 20%;
        }
    }
}
@media only screen and (min-width: 400px) and (max-width: 445px){

    .social {
        img{
            display: flex;
        }
        margin-top: -70px;
        margin-left: 205px;
        .img1{
            width: 50%;
        }
        .img2{
            width: 20%;
        }
    }
}
@media only screen and (min-width: 446px) and (max-width: 499px){

    .social {
        img{
            display: flex;
        }
        margin-top: -80px;
        margin-left: 215px;
        .img1{
            width: 50%;
        }
        .img2{
            width: 20%;
        }
    }
}
@media only screen and (min-width: 500px) and (max-width: 575px){

    .social {
        img{
            display: flex;
        }
        margin-top: -90px;
        margin-left: 255px;
        .img1{
            width: 50%;
        }
        .img2{
            width: 20%;
        }
    }
}

@media only screen and (min-width: 481px) and (max-width: 575px){
    .download_form {
        margin-left: 40px;
        margin-top: -85px;
    }
    .free_trial{
        margin-top: -60px;
        margin-right: 25px;
        text-align: center;
        max-width: 25%;
    }
    .free_trial_2{
        margin-top: -45px;
        margin-right: 25px;
        text-align: center;
        max-width: 25%;
    }
}
@media only screen and (min-width: 576px) and (max-width: 767px){
    .download_form {
        margin-left: 50px;
        margin-top: -85px;
    }
    .free_trial{
        margin-top: -80px;
        margin-right: 30px;
        text-align: center;
    }
    .free_trial_2{
        margin-top: -45px;
        margin-right: 25px;
        text-align: center;
    }
    .social {
        img{
            display: flex;
        }
        margin-top: -80px;
        margin-left: 255px;
        .img1{
            width: 50%;
        }
        .img2{
            width: 20%;
        }
    }
}

@media only screen and (min-width: 768px) and (max-width: 991px){
    
    .download_form {
        margin-left: 60px;
        margin-top: -110px;
    }
    .free_trial{
        margin-top: -110px;
        margin-right: 40px;
        text-align: center;
    }
    .free_trial_2{
        margin-top: -70px;
        margin-right: 30px;
        text-align: center;
    }
    .social {
        margin-top: -120px;
    }
}
@media screen and (min-width: 992px){
	.modalbanner {
		.banner-small {
			display: none;
		}
		.banner-large {
			display: block;
		}
	}
}
</style>
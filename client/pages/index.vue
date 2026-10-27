<template>
	<div>
		<div class="container slide-slider">
			<div class="row">
				<div class="col-lg-12">
					<div id="homeSlider" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#homeSlider" v-for="(slider, index) in sliderList" :key="index" :data-slide-to="index" ></li>
						</ol>
						<div class="carousel-inner">
							<div class="carousel-item" v-for="(slider, index) in sliderList" :key="index" :class="{ active: index == 0 }">
								<a :href="slider.link">
									<!-- <img class="d-block w-100" :src="`/assets/images/slider/${slider.path}`" alt="First slide"> -->
									<img class="d-block w-100" :src="`https://mliesl.edu:81/images/slider/${slider.path}`" alt="First slide">
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
		<div class="container announcement">
			<div class="row">
				<div class="col-lg-12">
					<div class="vaccines" v-for="announcement in announcementlist" :key="announcement.id">
						<p> <span v-html="announcement.text"></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="container promotion">
			<div class="row">
				<div class="col-lg-12" v-for="banner in bannerList" :key="banner.id">
					<img :src="`/assets/images/banner/${banner.path}`" alt="promotion" data-toggle="modal" :data-target="`.banner-${banner.id}`" width="100%" />
				</div>
			</div>
		</div>
		<div class="container people-choose-mli">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ details.peopleChooseMli.title }}</h2>
					<h4>{{ details.peopleChooseMli.subtitle }}</h4>
				</div>
			</div>
			<div class="row content">
				<div class="col-sm-12 col-md-4 col-lg-4" v-for="(info, index) in details.peopleChooseMli.lists" :key="`people-choose-mli-${index}`">
					<div class="box-shadow-group">
						<img :src="`/assets${info.image}`" width="100%" />
						<div class="group-text">
							<h5>{{ info.title }}</h5>
							<h6>{{ info.description }}</h6>
            				<paragraph :desc="info.read_more" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container highly-rated">
			<div class="row">
				<div class="col-lg-12">
					<img :src="`/assets${details.highlyRated}`" width="100%" />
				</div>
			</div>
		</div>
		<div class="container courses">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ details.courses.title }}</h2>
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6" v-for="(info, index) in details.courses.lists" :key="`courses-${index}`">
							<div class="box-border-group">
								<h5><img :src="`/assets${info.image}`" :alt="info.title" />&nbsp;&nbsp;{{ info.title }}</h5>
								<h6 v-for="(subtext, index1) in info.subtitle" :key="`courses-subtitle-${index}-${index1}`">
									<span v-html="subtext"></span>
								</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<template v-if="details.schedule">
			<div class="container schedule">
				<div class="row">
					<div class="col-lg-12">
         				<a :href="details.link">
							<img :src="`/assets${details.schedule}`" alt="Schedule" width="100%" />
						 </a>
					</div>
				</div>
			</div>
		</template>
		<div class="container-fluid photo-gallery">
			<div class="row justify-content-center">
				<div class="col-lg-12 scroll">
					<img class="w-10" src="/assets/images/home/photo-gallery-1.jpg" alt="First slide">
					<img class="w-20" src="/assets/images/home/photo-gallery-2.jpg" alt="Second slide">
					<img class="w-20" src="/assets/images/home/photo-gallery-3.jpg" alt="Third slide">
					<img class="w-20" src="/assets/images/home/photo-gallery-4.jpg" alt="Third slide">
					<img class="w-10" src="/assets/images/home/photo-gallery-5.jpg" alt="Third slide">
				</div>
			</div>
		</div>
		<div class="container partner-schools">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ details.partnerSchools.title }}</h2>
					<p>{{ details.partnerSchools.subtitle }}</p>
					<div class="row">
						<div class="col-lg-6">
							<img src="/assets/images/home/school-partners-map.jpg" width="100%"/>
						</div>
						<div class="col-lg-6">
							<img src="/assets/images/home/school-partners-logo.jpg" width="100%" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container location-campus">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ details.locationCampus.title }}</h2>
				</div>
			</div>
			<div class="row content">
				<div class="col-sm-12 col-md-6 col-lg-6" v-for="(info, index) in details.locationCampus.lists" :key="`location-campus-${index}`">
					<div class="box-shadow-group">
						<img :src="`/assets${info.image}`" width="100%" />
						<div class="group-text">
							<h5>{{ info.title }}</h5>
							<p>{{ info.subtitle }}</p>
            				<paragraph :desc="info.read_more" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container student-testimonials">
			<div class="row">
				<div class="col-lg-12">
					<h2>{{ details.testimonials.title }} <span class="TestimonialBtn"><a :href="details.testimonials.TestimonialLink" class="btn btn-primary" target="_blank">{{ details.testimonials.seemoreBtn }}</a></span></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 col-md-4 col-lg-4" v-for="testimonial in testimonialList.slice(0, 3)" :key="testimonial.id">
					<div class="box-shadow-group" >
						<img :src="`https://mliesl.edu:81/images/testimonial/${testimonial.image}`" :alt="testimonial.title" />
						<div class="group-text">
							<h5>{{ testimonial.title }}</h5>
							<p>{{ testimonial.text.substring(0,130)+".." }}</p>
              <a :href="`/testimonial?id=${testimonial.image.split('.')[0]}`" class="btn btn-primary"> {{ details.testimonials.readmoreBtn }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<Brochure />
		<div class="container brochure">
			<div class="row justify-content-center brochure">
				<div class="col-md-12 footer">
					<div class="col-md-4 logo-footer">
						<p>ACCREDITATION: </p>
						<a href="https://accet.org/" target="_blank">
							<img src="/assets/images/home/ACCET-new-logo.png" class="accet" />
						</a>
					</div>
					<div class="col-md-8 logo-footer2">
						<p>CERTIFICATIONS/ ASSOCIATIONS: </p>
						<a href="https://www.bppe.ca.gov/" target="_blank">
							<img src="/assets/images/home/BPPE.png" class="bppe"/>
						</a>
						<a href="https://www.nafsa.org/" target="_blank">
							<img src="/assets/images/home/Nafsa.png" class="nafsa"/>
						</a>
						
					</div>
				</div>
			</div>
		</div>

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
		layout: 'home',
		async asyncData({ $content, $axios }) {
			const details = await $content(`home/en`).fetch();

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
				testimonialList: [],
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
				this.testimonialList = response.testimonial_list;
			});
		},
		head() {
			if(this.details) {
				return {
					// htmlAttrs: {
					// 	lang: 'en'
					// },
					// script: [
					// 	{
					// 		src: 'https://cdn-cookieyes.com/client_data/b1a9e825aa3041a5b41cd798/script.js', id:"cookieyes", type:"text/javascript"
					// 	},
					// 	{
					// 		type:'text/javascript',
					// 		innerHTML: JSON.stringify(this.conf)
					// 	}
					// ],
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
		}
	}
</script>

<style lang="scss" scoped>
.container, .container-fluid {
	margin-top: 50px;
	background-color: #FFFFFF;
}
.slide-slider {
	position: relative;
	z-index: -2;
	margin-top: 0px;
	background-color: #EDECEC;
}
.vaccines {
  border: 1px solid #5AACEC;
  box-sizing: border-box;
  border-radius: 6px;
  padding: 20px;
}
.promotion {
	margin-top: 30px;
}
.people-choose-mli {
	margin-top: 50px;

	.row.content {
		margin-top: 20px;

		.col-lg-4 {
			margin-bottom: 50px;
		}
	}
}
.courses {
	.col-lg-6 {
		margin-bottom: 20px;
	}
}
.partner-schools {
	p {
		font-size: 16px;
		line-height: 19px;
		text-align: center;
	}
}
.location-campus {
	.row .content {
		margin-top: 20px;
	}
}
.student-testimonials {
	h2 {
		margin-bottom: 20px;
	}
	.col-lg-4 {
		margin-bottom: 50px;
	}
	.box-shadow-group img {
		width: 100%;
		object-fit: cover;
    object-position: top;
		max-height: 235px;
	}
}
.brochure {
	text-align: center;

	.row {
		margin-top: 50px;
	}
	img {
		width: auto;
		max-height: 127px;
	}
}

.box-border-group {
	padding: 20px;
	background: #FFFFFF;
	border: 1px solid #5AACEC;
	box-sizing: border-box;
	border-radius: 6px;
	height: 100%;

	img {
		max-height: 35px;
		float: left;
	}
	h5 {
		font-weight: 500;
		font-size: 20px;
		line-height: 24px;
		text-align: left;
		color: #0062AF;
	}
	h6 {
		font-style: normal;
		font-weight: normal;
		font-size: 16px;
		line-height: 24px;
		color: #3D4C5C;
	}
}

.modalbanner {
	.banner-large {
		display: none;
	}
	.banner-small {
		display: block;
	}
}

@media screen and (max-width: 767px) {
	.TestimonialBtn{
		display: block;
	}
}
@media screen and (max-width: 362px) {
	.footer {
		p {
			margin-top: 20px !important; 
			font-weight: bold; 
			font-size: 10px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 60%;
				margin-left: -35px;
				margin-top: -5px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				width: 135%;
				margin-left: -5px;
			}
			.nafsa {
				width: 130%;
				margin-left: 10px;
			}
		}
	}
}
@media screen and (min-width: 363px) and (max-width: 389px) {
	.footer {
		p {
			margin-top: 20px !important; 
			font-weight: bold; 
			font-size: 11px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 60%;
				margin-left: -35px;
				margin-top: 0px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				width: 135%;
				margin-left: -5px;
			}
			.nafsa {
				width: 130%;
				margin-left: 10px;
			}
		}
	}
}
@media screen and (min-width: 390px)  and (max-width: 431px) {
	.footer {
		p {
			margin-top: 25px !important; 
			font-weight: bold; 
			font-size: 12px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 70%;
				margin-left: -35px;
				margin-top: 0px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				width: 120%;
				margin-left: -5px;
				// margin-right: 20px;
			}
			.nafsa {
				width: 120%;
				margin-left: 5px;
			}
		}
	}
}
@media screen and (min-width: 432px)  and (max-width: 488px) {
	.footer {
		p {
			margin-top: 25px !important; 
			font-weight: bold; 
			font-size: 13px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 60%;
				margin-left: -25px;
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				margin-left: -15px;
				padding-left: 15px;
				width: 120%;
				margin-right: 35px;
			}
			.nafsa {
				width: 120%;
				// margin-left: 15px;
			}
		}
	}
}
@media screen and (max-width: 767px) {
	.brochure, .photo-gallery {
		img {
			width: 100%;
		}
	}
	
}
@media screen and (min-width: 489px) and (max-width: 575px) {
	.footer {
		p {
			margin-top: 35px !important; 
			font-weight: bold; 
			font-size: 15px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 80%;
				margin-left: -25px;
				margin-top: 0px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				width: 125%;
				margin-left: -5px;
			}
			.nafsa {
				width: 115%;
				margin-left: 10px;
			}
		}
	}
}
@media screen and (min-width: 576px) and (max-width: 767px) {
	.footer {
		margin-left: 20px;
		p {
			margin-top: 50px !important; 
			font-weight: bold; 
			font-size: 17px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 85%;
				margin-top: 0px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				margin-left: -15px;
				padding-left: 15px;
				width: 200%;
				margin-right: 35px;
			}
			.nafsa {
				width: 200%;
				margin-left: 35px;
			}
		}
	}
}
@media screen and (min-width: 768px){
	.courses {
		h5 {
			text-align: center;

			img {
				float: unset;
			}
		}
	}
	.people-choose-mli .box-shadow-group {
		.group-text {
			h5 {
				min-height: 45px;
			}
		}
	}
	.student-testimonials {
		.box-shadow-group {
			img {
				max-height: 140px;
			}
			h5 {
				min-height: 75px;
			}
		}
	}
	.photo-gallery {
		.col-lg-12 {
			display: inline-flex;
			padding: 0;
			overflow-y: hidden;
			overflow-x: scroll;
		}
	}
}

@media screen and (min-width: 768px) and (max-width: 991px){
	.footer {
		margin-left: 50px;
		p {
			margin-top: 50px !important; 
			font-weight: bold; 
			font-size: 17px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 200%;
				margin-top: 0px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				margin-left: -15px;
				padding-left: 15px;
				width: 200%;
				margin-right: 35px;
			}
			.nafsa {
				width: 200%;
				margin-left: 25px;
			}
		}
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
	.student-testimonials .box-shadow-group img {
    max-height: 193px;
	}
	.box-shadow-group {
		.group-text {
			h5 {
				min-height: 73px;
			}
		}
	}
	.modal-dialog {
		max-width: 950px;
	}
}

@media screen and (min-width: 992px) and (max-width: 1199px) {
	.footer {
		margin-left: 50px;
		display: flex;
		p {
			margin-top: 50px !important; 
			font-weight: bold; 
			font-size: 17px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 80%;
				margin-top: -20px !important; 
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				margin-left: -15px;
				padding-left: 15px;
				width: 90%;
			}
			.nafsa {
				margin-left: -50px;
				padding-left: 5px;
				width: 90%;
			}
		}
	}
}


@media screen and (min-width: 1200px) {
	.student-testimonials .box-shadow-group img {
    max-height: 233px;
	}
	.box-shadow-group {
		.group-text {
			h5 {
				min-height: 73px;
			}
		}
	}
	.footer {
		margin-left: 50px;
		display: flex;
		p {
			margin-top: 80px !important; 
			font-weight: bold; 
			font-size: 18px; 
			padding-right: 15px;
			display: inline-block;
			white-space: nowrap;
		}
		
		.logo-footer{
			display: flex;
			.accet {
				width: 90%;
				//margin-top: 40px !important;
			}
		}

		.logo-footer2{
			display: flex;
			.bppe {
				margin-left: -15px;
				padding-left: 15px;
				width: 90%;
			}
			.nafsa {
				margin-left: -50px;
				padding-left: 15px;
				width: 95%;
			}
		}
	}
}
@media screen and (min-width: 1024px) {
	.student-testimonials {
		margin-top: 100px;
	}
	.box-shadow-group {
		.group-text {
			h5 {
				min-height: 50px;
			}
		}
	}
}
@media screen and (max-width: 1024px) {
	.vaccines .links div {
		margin-bottom: 15px;
	}

	h2 {
		font-size: 28px;
		line-height: 34px;
	}
	h4 {
		font-size: 22px;
		line-height: 26px;
	}
}
</style>


<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <img :src="`/assets${details.image}`" :alt="details.title" class="w-100 mb-5" />
        <paragraph :desc="details.subtitle" />
      </div>
    </div>

	<h5 class="titles mt-3"><b>{{ details.services.title }}</b></h5>
	<p>{{ details.services.subtitle }}</p>
	<paragraph :desc="details.services.lists" class="mb-5"/>
	
	<h5 class="titles mt-3"><b><center>{{ details.format.title }}</center></b></h5>
	<mli-table :tableMaxCol="details.format.table.tableMaxCol" :tableInfo="details.format.table" />
	<paragraph :desc="details.format.description" />
	<img :src="`/assets${details.format.image}`" :alt="details.format.title" class="w-100 mb-5" style="padding-left: 75px; padding-right: 75px;"/>

	<p>{{ details.sample.subtitle }}</p>
	<div class="box mb-5">
		<p class="titles">{{ details.sample.listTitle }}</p>
		<paragraph :desc="details.sample.list" />
	</div>
	<div class="box2 mb-5">
		<p class="titles"><em>{{ details.sample.sample1.title }}</em></p>
		<p class="mb-5">{{ details.sample.sample1.description}} </p>
		<p class="titles">{{ details.sample.sample1.subtitle }}</p>
		<paragraph :desc="details.sample.sample1.subdescription" />
	</div>
	<div class="box2 mb-5">
		<p class="titles"><em>{{ details.sample.sample2.title }}</em></p>
		<p class="mb-5">{{ details.sample.sample2.description}} </p>
		<p class="titles">{{ details.sample.sample2.subtitle }}</p>
		<paragraph :desc="details.sample.sample2.subdescription" />
	</div>
	<p>{{ details.sample.description }}</p>


    <brochure />
  </div>
</template>

<script>
	export default {
    async asyncData({ $content, params }) {
			const details = await $content(`official-toefl-test/en`).fetch();

			return {
				details
			}
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
		}
	}
</script>
<style lang="scss">
.titles {
	font-weight: 600;
    color: #333 !important;
	font-size: 20px !important;
	border-bottom: solid 3px #c0c0c0;
	padding-bottom: 8px;
	margin-bottom: 25px;
}
.box {
	background: #f6fbf9; 
	padding: 10px; 
	border: dotted 3px #00ac97; 
	border-radius: 10px; 
}
.box2 {
	border: 3px solid #ffd54f; 
	padding: 10px;
}
.arrow {
  position: relative;
  padding-left: 25px;
	width: fit-content;
}

.arrow:before {
  position: absolute;
  content: '';
  bottom: -3px;
  left: 0;
  width: 0;
  height: 0;
  border: none;
  border-left: solid 15px transparent;
  border-bottom: solid 15px rgb(119, 195, 223);
}
.arrow:after {
  position: absolute;
  content: '';
  bottom: -3px;
  left: 10px;
  width: 100%;
  border-bottom: solid 3px rgb(119, 195, 223);
}
.circle{   
	width: 50px;
	padding: 7px 10px;
	border-radius: 80%;
	text-align: center;
	font-size: 16px;
	background-color: #58be89;
	color: white;
}

</style>
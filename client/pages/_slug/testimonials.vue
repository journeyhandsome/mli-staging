<template>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>{{ details.title }}</h1>
        <span class="sort-text">{{ details.selectBy.title }}</span>

        <div class="dropdown d-inline" v-for="(selection, s_index) in details.selectBy.selections" :key="`select-by-${s_index}`">
          <select v-model="formData[selection.key]" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" @change="onSelect($event)">
            <template v-for="(list, l_index) in selection.lists" >
              <option :value="list.value == '' ? list.value : list.title" :key="`select-by-${s_index}-${l_index}`" :style="`background-image: url(${list.image});`">
                {{ list.title }}
              </option>
            </template>
          </select>
        </div>

        <h3>{{ details.comments.title }}</h3>

        <div class="row mt-3">
          <div class="col-sm-12 col-md-6 col-lg-6 mb-5" v-for="testimonial in testimonialList.slice((10 * (activePage-1)), (10 * activePage))" :key="testimonial.id">
            <div class="box-shadow-group" >
						  <img :src="`https://mliesl.edu:81/images/testimonial/${testimonial.image}`" :alt="testimonial.title" />
              <div class="group-text">
                <h5>{{ testimonial.title }}</h5>
                <p>{{ testimonial.text.substring(0,100)+".." }}</p>

                <a :href="`/${lang}/testimonial?id=${testimonial.image.split('.')[0]}`" class="btn btn-primary"> {{ details.readmoreBtn }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item" :class="{disabled: (1 == activePage)}">
                <a class="page-link" href="#" tabindex="-1" @click="updateActivePage(activePage - 1)">Previous</a>
              </li>
              <template v-for="item in totalPages">
                <li class="page-item" :class="{active: (item == activePage)}" :key="`paginate-${item}`">
                  <a class="page-link" href="#" @click="updateActivePage(item)">{{ item }}</a>
                </li>
              </template>
              <li class="page-item" :class="{disabled: (activePage == totalPages)}">
                <a class="page-link" href="#" @click="updateActivePage(activePage + 1)">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
	export default {
		async asyncData({ $content, $axios, params }) {
			const details = await $content(`testimonials/${params.slug}`).fetch();
      const lang = params.slug;
      const response = await $axios.$get(`/get_home_info/${params.slug}`);

      const allTestimonials = response.testimonial_list;

			return {
				details,
        lang,
        allTestimonials
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
		},
    data: function() {
      let formdata = [];
          formdata['campus'] = '';
          formdata['nationality'] = '';

      return {
        testimonialList: [],
        totalPages: 1,
        activePage: 1,
        formData: formdata,
      }
    },
    methods: {
      onSelect(e) {
        e.preventDefault();

        let testimonials = this.allTestimonials;

        if(this.formData['nationality']) {
          testimonials = testimonials.filter(testimonial => testimonial.nationality_name == this.formData['nationality']);
        }

        if(this.formData['campus']) {
          testimonials = testimonials.filter(testimonial => testimonial.campus_name.includes(this.formData['campus']));
        }

        this.testimonialList = testimonials;
        this.resetPagination();
      },
      updateActivePage(num) {
        this.activePage = num;
      },
      resetPagination() {
        this.totalPages = Math.round(this.testimonialList.length / 10);
        this.activePage = 1;
      }
    },
    mounted() {
      this.testimonialList = this.allTestimonials;
      this.resetPagination();
    }
	}
</script>

<style lang="scss" scoped>
select {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
  padding: .5rem 1rem;
  font-size: 1.25rem;
  line-height: 1.5;
  border-radius: .3rem;
  margin-right: 10px;

  option {
   color: #0062cc;
   background-color: #FFFFFF; 
  }
}
.box-shadow-group {
  text-align: center;
  overflow: hidden;

  img {
    min-height: 220px;
    max-height: 220px;
    width: auto;
  }
}

@media screen and (min-width: 900px) {
  .box-shadow-group img {
    min-height: 260px;
    max-height: 260px;
  }
}
</style>
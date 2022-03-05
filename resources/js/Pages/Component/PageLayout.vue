<template>
  <div>
    <Head :title="title" />

    <div class="bg-[url('/images/mountain.jpg')]">
      <div
        class="px-4 py-5 sm:max-w-xl md:max-w-full md:px-24 lg:px-8"
        :class="artikelHeader"
      >
        <div class="relative flex items-center justify-between">
          <div class="flex items-center">
            <Link
              :href="route('welcome')"
              :active="route().current('welcome')"
              aria-label="Logo"
              title="Logo"
              class="inline-flex items-center mr-8"
            >
              <img
                src="/images/logo-ripala.png"
                alt="Logo"
                class="h-24 w-32"
                ref="logo"
              />
            </Link>
            <ul class="flex items-center hidden space-x-8 lg:flex">
              <li>
                <nav-link
                  :href="route('welcome')"
                  :active="route().current('welcome')"
                  :class="textColor"
                  >Beranda
                </nav-link>
              </li>
              <li>
                <nav-link
                  :href="route('artikel')"
                  :active="route().current('artikel')"
                  :class="textColor"
                  >Artikel
                </nav-link>
              </li>
              <li>
                <nav-link
                  :href="route('pendaftaran-anggota')"
                  :active="route().current('pendaftaran-anggota')"
                  :class="textColor"
                >
                  Pendaftaran Anggota
                </nav-link>
              </li>
            </ul>
          </div>
          <ul class="flex items-center hidden space-x-8 lg:flex">
            <li>
              <nav-link :href="route('tentang-kami')" :class="textColor"
                >Tentang Kami</nav-link
              >
            </li>
            <li>
              <nav-link :href="route('contact-us')" :class="textColor"
                >Hubungi Kami</nav-link
              >
            </li>
          </ul>
          <div class="lg:hidden">
            <button
              aria-label="Open Menu"
              title="Open Menu"
              class="
                p-2
                -mr-1
                transition
                duration-200
                rounded
                focus:outline-none focus:shadow-outline
                hover:bg-deep-purple-50
                focus:bg-deep-purple-50
              "
              @click="isMenuOpen = true"
            >
              <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                <path
                  fill="currentColor"
                  d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"
                ></path>
                <path
                  fill="currentColor"
                  d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"
                ></path>
                <path
                  fill="currentColor"
                  d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"
                ></path>
              </svg>
            </button>
            <div v-if="isMenuOpen" class="absolute top-0 left-0 w-full">
              <div class="p-5 bg-white border rounded shadow-sm">
                <div class="flex items-center justify-between mb-4">
                  <div>
                    <Link
                      :href="route('welcome')"
                      :active="route().current('welcome')"
                      aria-label="Logo"
                      title="Logo"
                      class="inline-flex items-center mr-8"
                    >
                      <img
                        src="/images/logo-ripala.png"
                        alt="Logo"
                        class="h-24 w-32"
                        ref="logo"
                      />
                    </Link>
                  </div>
                  <div>
                    <button
                      aria-label="Close Menu"
                      title="Close Menu"
                      class="
                        p-2
                        -mt-2
                        -mr-2
                        transition
                        duration-200
                        rounded
                        hover:bg-gray-200
                        focus:bg-gray-200
                        focus:outline-none
                        focus:shadow-outline
                      "
                      @click="isMenuOpen = false"
                    >
                      <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                        <path
                          fill="currentColor"
                          d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                        ></path>
                      </svg>
                    </button>
                  </div>
                </div>
                <nav>
                  <ul class="space-y-4">
                    <li>
                      <nav-link
                        :href="route('welcome')"
                        :active="route().current('welcome')"
                      >
                        Beranda
                      </nav-link>
                    </li>
                    <li>
                      <nav-link
                        :href="route('artikel')"
                        :active="route().current('artikel')"
                      >
                        Artikel
                      </nav-link>
                    </li>
                    <li>
                      <nav-link
                        :href="route('pendaftaran-anggota')"
                        :active="route().current('pendaftaran-anggota')"
                        >Pendaftaran Anggota
                      </nav-link>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- page content -->
      <div class="flex flex-col" :class="bodyHeight">
        <slot></slot>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-gray-600 body-font bg-[url('/images/mountain.jpg')]">
      <div
        class="
          container
          px-5
          py-24
          mx-auto
          flex
          md:items-center
          lg:items-start
          md:flex-row md:flex-nowrap
          flex-wrap flex-col
        "
      >
        <div
          class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left"
        >
          <a
            class="
              flex
              title-font
              font-medium
              items-center
              md:justify-start
              justify-center
              text-gray-900
            "
          >
            <Link
              :href="route('welcome')"
              :active="route().current('welcome')"
              aria-label="Logo"
              title="Logo"
              class="inline-flex items-center"
            >
              <img
                src="/images/logo-ripala.png"
                alt="Logo"
                class="h-24 w-32"
                ref="logo"
              />
            </Link>
            <span class="font-bold ml-4 text-2xl tracking-wider">RIPALA</span>
          </a>
        </div>
        <div
          class="
            flex-grow flex flex-wrap
            md:pl-20
            -mb-10
            md:mt-0
            mt-10
            md:text-left
            text-center
          "
        >
          <div class="lg:w-1/4 md:w-1/2 w-full px-4 ml-auto">
            <h2
              class="
                title-font
                font-bold
                text-gray-900
                tracking-widest
                text-sm
                mb-3
                flex
              "
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                  clip-rule="evenodd"
                />
              </svg>
              ALAMAT
            </h2>
            <a
              href="https://www.google.com/maps/place/Universitas+Raharja/@-6.1953971,106.6322282,17z/data=!3m1!4b1!4m5!3m4!1s0x2e69f92f1c580343:0xe46d6a860cce25ec!8m2!3d-6.1954024!4d106.6344169"
              target="_blank"
              class="hover:underline"
            >
              Jl. Jenderal Sudirman No.40, RT.002/RW.006, Cikokol, Kec.
              Tangerang, Kota Tangerang, Banten 15117
            </a>
          </div>
          <div class="lg:w-1/4 md:w-1/2 w-full px-4 ml-auto">
            <h2
              class="
                title-font
                font-bold
                text-gray-900
                tracking-widest
                text-sm
                mb-3
                flex
              "
            >
        
<svg style="margin-right: 6px;width: 21px !important;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
              ripala.tng@gmail.com
            </h2>
            <h2
              class="
                title-font
                font-bold
                text-gray-900
                tracking-widest
                text-sm
                mb-3
                flex
              "
            >
              <svg
                style="margin-right:8px"
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5 mr-4"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"
                />
              </svg>
              083879010259
            </h2>
        
            <h2
              class="
                title-font
                font-bold
                text-gray-900
                tracking-widest
                text-sm
                mb-3
                flex
              "
            >
              <svg
                class="h-5 w-5"
                viewBox="0 0 256 256"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                preserveAspectRatio="xMidYMid"
                style="margin-right:8px"
              >
                <g>
                  <path
                    d="M127.999746,23.06353 C162.177385,23.06353 166.225393,23.1936027 179.722476,23.8094161 C192.20235,24.3789926 198.979853,26.4642218 203.490736,28.2166477 C209.464938,30.5386501 213.729395,33.3128586 218.208268,37.7917319 C222.687141,42.2706052 225.46135,46.5350617 227.782844,52.5092638 C229.535778,57.0201472 231.621007,63.7976504 232.190584,76.277016 C232.806397,89.7746075 232.93647,93.8226147 232.93647,128.000254 C232.93647,162.177893 232.806397,166.225901 232.190584,179.722984 C231.621007,192.202858 229.535778,198.980361 227.782844,203.491244 C225.46135,209.465446 222.687141,213.729903 218.208268,218.208776 C213.729395,222.687649 209.464938,225.461858 203.490736,227.783352 C198.979853,229.536286 192.20235,231.621516 179.722476,232.191092 C166.227425,232.806905 162.179418,232.936978 127.999746,232.936978 C93.8200742,232.936978 89.772067,232.806905 76.277016,232.191092 C63.7971424,231.621516 57.0196391,229.536286 52.5092638,227.783352 C46.5345536,225.461858 42.2700971,222.687649 37.7912238,218.208776 C33.3123505,213.729903 30.538142,209.465446 28.2166477,203.491244 C26.4637138,198.980361 24.3784845,192.202858 23.808908,179.723492 C23.1930946,166.225901 23.0630219,162.177893 23.0630219,128.000254 C23.0630219,93.8226147 23.1930946,89.7746075 23.808908,76.2775241 C24.3784845,63.7976504 26.4637138,57.0201472 28.2166477,52.5092638 C30.538142,46.5350617 33.3123505,42.2706052 37.7912238,37.7917319 C42.2700971,33.3128586 46.5345536,30.5386501 52.5092638,28.2166477 C57.0196391,26.4642218 63.7971424,24.3789926 76.2765079,23.8094161 C89.7740994,23.1936027 93.8221066,23.06353 127.999746,23.06353 M127.999746,0 C93.2367791,0 88.8783247,0.147348072 75.2257637,0.770274749 C61.601148,1.39218523 52.2968794,3.55566141 44.1546281,6.72008828 C35.7374966,9.99121548 28.5992446,14.3679613 21.4833489,21.483857 C14.3674532,28.5997527 9.99070739,35.7380046 6.71958019,44.1551362 C3.55515331,52.2973875 1.39167714,61.6016561 0.769766653,75.2262718 C0.146839975,88.8783247 0,93.2372872 0,128.000254 C0,162.763221 0.146839975,167.122183 0.769766653,180.774236 C1.39167714,194.398852 3.55515331,203.703121 6.71958019,211.845372 C9.99070739,220.261995 14.3674532,227.400755 21.4833489,234.516651 C28.5992446,241.632547 35.7374966,246.009293 44.1546281,249.28042 C52.2968794,252.444847 61.601148,254.608323 75.2257637,255.230233 C88.8783247,255.85316 93.2367791,256 127.999746,256 C162.762713,256 167.121675,255.85316 180.773728,255.230233 C194.398344,254.608323 203.702613,252.444847 211.844864,249.28042 C220.261995,246.009293 227.400247,241.632547 234.516143,234.516651 C241.632039,227.400755 246.008785,220.262503 249.279912,211.845372 C252.444339,203.703121 254.607815,194.398852 255.229725,180.774236 C255.852652,167.122183 256,162.763221 256,128.000254 C256,93.2372872 255.852652,88.8783247 255.229725,75.2262718 C254.607815,61.6016561 252.444339,52.2973875 249.279912,44.1551362 C246.008785,35.7380046 241.632039,28.5997527 234.516143,21.483857 C227.400247,14.3679613 220.261995,9.99121548 211.844864,6.72008828 C203.702613,3.55566141 194.398344,1.39218523 180.773728,0.770274749 C167.121675,0.147348072 162.762713,0 127.999746,0 Z M127.999746,62.2703115 C91.698262,62.2703115 62.2698034,91.69877 62.2698034,128.000254 C62.2698034,164.301738 91.698262,193.730197 127.999746,193.730197 C164.30123,193.730197 193.729689,164.301738 193.729689,128.000254 C193.729689,91.69877 164.30123,62.2703115 127.999746,62.2703115 Z M127.999746,170.667175 C104.435741,170.667175 85.3328252,151.564259 85.3328252,128.000254 C85.3328252,104.436249 104.435741,85.3333333 127.999746,85.3333333 C151.563751,85.3333333 170.666667,104.436249 170.666667,128.000254 C170.666667,151.564259 151.563751,170.667175 127.999746,170.667175 Z M211.686338,59.6734287 C211.686338,68.1566129 204.809755,75.0337031 196.326571,75.0337031 C187.843387,75.0337031 180.966297,68.1566129 180.966297,59.6734287 C180.966297,51.1902445 187.843387,44.3136624 196.326571,44.3136624 C204.809755,44.3136624 211.686338,51.1902445 211.686338,59.6734287 Z"
                    fill="#0A0A08"
                  ></path>
                </g>
              </svg>

              @ripalatangerang
            </h2>
          </div>
        </div>
      </div>
      <div class="bg-gray-100">
        <div
          class="
            container
            mx-auto
            py-4
            px-5
            flex flex-wrap flex-col
            sm:flex-row
          "
        >
          <p class="text-gray-500 text-sm text-center sm:text-left">
            © 2022 E-Mountaineering
          </p>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavLink from "@/Pages/Component/NavLink";

export default defineComponent({
  props: {
    title: String,
  },

  components: {
    Head,
    Link,
    NavLink,
  },

  data() {
    return {
      isMenuOpen: false,
    };
  },

  computed: {
    artikelHeader() {
      return this.route().current("artikel.*")
        ? "transparent drop-shadow-md"
        : "";
    },
    bodyHeight() {
      return this.route().current("welcome") ? "h-screen" : "";
    },
    textColor() {
      return this.route().current("artikel.*") ? "text-black" : "";
    },
  },
});
</script>

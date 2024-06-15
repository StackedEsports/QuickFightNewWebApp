<script setup>
import { useTemplateStore } from "@/stores/template";

// Main store
const store = useTemplateStore();
</script>

<template>
  <!-- Footer -->
  <footer id="page-footer">
    <slot>
      <div class="bg-body-light">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              <slot name="content-right">
                Crafted with
                <i class="fa fa-heart text-danger"></i> in
                <span class="d-inline-flex align-items-center">
                  <img src="https://flagcdn.com/h20/ca.png" srcset="https://flagcdn.com/h40/ca.png 2x,
https://flagcdn.com/h60/ca.png 3x" height="12" alt="Canada">
                </span>
              </slot>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <slot name="content-left">
                <a class="fw-semibold" href="https://pixelcave.com/products/oneui-vue-edition">{{ store.app.name + " " +
                  store.app.version }}</a>
                &copy; {{ store.app.copyright }}
              </slot>
            </div>
          </div>
        </div>
      </div>
    </slot>
  </footer>
  <!-- END Footer -->
</template>

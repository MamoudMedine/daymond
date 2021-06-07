<form id="change_product_img_form" class="p-2 mt-2"
      enctype="multipart/form-data" method="post" wire:submit.prevent="updateImage">
    <!--Body-->
    <input name="currentImageId" type='hidden' class="currentImageId" id="currentImageId"
           wire:model.lazy="currentImageId"/>

    <input name="image" type='file' class="image" id="image" wire:model.lazy="image"/>
    <!--Footer-->
    <div class="flex justify-end pt-2">
        <button type="submit" id="btn_edit_img_product"
                class="px-4 bg-blue-500 p-1 rounded-lg text-white hover:bg-blue-400 mr-2">
            <i class="fa fa-edit"></i> Modifier
        </button>
        <button type="button" class="modal-close px-4 bg-gray-500 p-1 rounded-lg text-white hover:bg-red-500">
            <i class="fa fa-undo"></i> Annuler
        </button>
    </div>
</form>

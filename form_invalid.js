
    window.alert('Your info is wrong !')
    popup_title.textContent = 'Add new Product';
    overlay_popup.classList.remove('hidden');
    popup_edit.classList.remove('hidden');
    popup_edit.classList.add('add_product');
    input_action.setAttribute('value','add')
    popup_edit.querySelector('.img_box').innerHTML = '';
    let render = `<input type='file' name='file_uploader' id='file_uploader'><svg><use href='images/SVG/sprite.svg#add_uploader'></use></svg>`;
    popup_edit.querySelector('.img_box').innerHTML = render;

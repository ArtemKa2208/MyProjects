let photos = document.querySelectorAll('.arr_of_photo');
let button_left = document.querySelector('.button_left_for_slide');
let button_right = document.querySelector('.button_right_for_slide');
let class_photos = document.querySelectorAll('.photo_in_comments');
photos[0].style.display = 'block';
let count = 0;
button_left.onclick = function(){
      if(count == 0){
            photos[count].style.display = 'none';
            count = photos.length-1;
            photos[count].style.display = 'block';
      }else{
            photos[count].style.display = 'none';
            count--;
            photos[count].style.display = 'block';
      }

}

button_right.onclick = function(){
      if(count == photos.length-1){
            photos[count].style.display = 'none';
            count = 0;
            photos[count].style.display = 'block';
      }else{
            photos[count].style.display = 'none';
            count++;
            photos[count].style.display = 'block';
      };

};
let it_is_smart = class_photos[0].className.split(/\s+/)[1];
document.querySelector('.' + it_is_smart).style.display = 'block';
for(let i = 0; i < class_photos.length;i++){
      class_photos[i].onclick = slide_in_comments;
      if(it_is_smart != class_photos[i].className.split(/\s+/)[1]){
            it_is_smart = class_photos[i].className.split(/\s+/)[1];
            document.querySelector('.' + it_is_smart).style.display = 'block';
      }
}

//  let last_try = document.querySelectorAll('.' + it_is_smart);

function slide_in_comments(){
      let second_class = this.className.split(/\s+/)[1];
      let comments_photo = document.querySelectorAll('.' + second_class);
      let main_div = comments_photo[0].parentNode;
      let main_div_class = main_div.className.split(/\s+/)[1];
      let main_div_second_class = document.querySelector('.' + main_div_class);
      let div = document.createElement('div'); 
      div.className = 'div_where_i_save_photo_for_comments';
      document.body.appendChild(div);

      let img_comment_button_left = document.createElement('button');
      img_comment_button_left.className = 'img_comment_button_left';
      img_comment_button_left.innerHTML = 'Left';

      let img_comment_button_right = document.createElement('button');
      img_comment_button_right.className = 'img_comment_button_right';
      img_comment_button_right.innerHTML = 'Right';

      let close_slide = document.createElement('button');
      close_slide.className = 'close_slide';
      close_slide.innerHTML = '×';

      div.appendChild(img_comment_button_left);

      for(i = 0; i < comments_photo.length;i++){
            comments_photo[i].onclick = function(){};
            div.appendChild(comments_photo[i]);
            // comments_photo[i].classList.remove("photo_in_comments");
            comments_photo[i].classList.add('it_temp_class_for_photo');

      }
      div.appendChild(close_slide);
      div.appendChild(img_comment_button_right);



      let count_for_comm = 0;
      img_comment_button_left.onclick = function(){
            if(count_for_comm == 0){
                  comments_photo[count_for_comm].style.display = 'none';
                  count_for_comm = comments_photo.length-1;
                  comments_photo[count_for_comm].style.display = 'block';
            }else{
                  comments_photo[count_for_comm].style.display = 'none';
                  count_for_comm--;
                  comments_photo[count_for_comm].style.display = 'block';
            }
      
      }
      
      img_comment_button_right.onclick = function(){
            if(count_for_comm == comments_photo.length-1){
                  comments_photo[count_for_comm].style.display = 'none';
                  count_for_comm = 0;
                  comments_photo[count_for_comm].style.display = 'block';
            }else{
                  comments_photo[count_for_comm].style.display = 'none';
                  count_for_comm++;
                  comments_photo[count_for_comm].style.display = 'block';
            };
      
      };
      close_slide.onclick = function(){        
            img_comment_button_left.remove();
            img_comment_button_right.remove();
            close_slide.remove();
            for(i = 0; i < comments_photo.length;i++){
                  // div.appendChild(comments_photo[i]);]
                  comments_photo[i].onclick = slide_in_comments;
                  div.remove();
                  main_div_second_class.appendChild(comments_photo[i]);
                  comments_photo[i].classList.remove("it_temp_class_for_photo");
                  // comments_photo[i].classList.add("photo_in_comments");
                  comments_photo[i].style.display = 'none';
            }
            
           
            
            comments_photo[0].style.display = 'block';


      }
}


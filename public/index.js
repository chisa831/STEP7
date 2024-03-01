if(window.confirm("本当に削除しますか？")){
    window.open("削除しました。");
}

document.getElementById('create').addEventListener('click', function(){
    window.location.href='http://localhost:8888/STEP7/public/create';
});
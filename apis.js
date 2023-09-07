// const prof_name=prof_name;
const color=["#9dd800"];

window.onload = function() {
  if (window.location.href.toLowerCase()=='http://localhost/DailUP/DB_conn.php'.toLowerCase()) create();
  if (window.location.href.toLowerCase()=='http://localhost/DailUP/view-profilebtn.html'.toLowerCase()) viewpro();
  if (window.location.href.toLowerCase()=='http://localhost/DailUP/view-profile.html'.toLowerCase()) viewpro();   
};

const create = () => {
  console.log("bot aay gata")
  const parentDiv = document.querySelector('#main_card_info');
  parentDiv.innerHTML="";
  document.querySelector('.HEADING').innerHTML=`<h1>CATAGORIES</h1>`;
  const keys = Object.keys(prof_name);
  console.log(prof_name);
    for (let i = 0; i < keys.length; i++) {
      newDiv = document.createElement("div");
      newDiv.className = "main_cards_cata inner_card_txt" 
      newDiv.id = keys[i]
      newDiv.style.backgroundColor=color[parseInt(Math.random()*100)%color.length];
      newDiv.innerText=keys[i];
      newDiv.onclick=(event)=>{
        profile(event.target.id)
      };
      // parentDiv.innerHTML+= `<div style="background-color:${color[parseInt(Math.random()*100)%color.length]};" id=${keys[i]} class="main_cards_cata inner_card_txt" onclick='profile(event.target.firstChild)' >${keys[i]}</div>`;
      parentDiv.appendChild(newDiv); 
    }
}



const profile = (id) =>{
  const parentDiv = document.querySelector('#main_card_info');
  document.querySelector('.HEADING').innerHTML=`<h1>${id.toUpperCase()}</h1>`;
  parentDiv.innerHTML="";
  let nm=prof_name[id];
  for (let i = 0; i < nm.length; i++) {
    //parentDiv.innerHTML+= `<div style="background-color:${color[parseInt(Math.random()*100)%color.length]};" id="$}" class=""  >${nm[i][1]}</div>`; 
    newDiv = document.createElement("div");
    newDiv.className = "main_cards_cata inner_card_txt" 
    newDiv.id = nm[i][0]
    newDiv.style.backgroundColor=color[parseInt(Math.random()*100)%color.length];
    newDiv.innerText=nm[i][1];

    newDiv.onclick=(event)=>{
      let goingToLocalStorage = all_info[event.target.id].slice();
      goingToLocalStorage.push(id);
      localStorage.setItem('info',JSON.stringify(goingToLocalStorage));
      window.location.href="http://localhost/DailUP/view-profilebtn.html";
    };
    parentDiv.appendChild(newDiv); 
  }
}

const viewpro = () =>{
  console.log("aaya");
  const infos=localStorage.getItem('info');
  const data=JSON.parse(infos);
  console.log(data);

  document.querySelector('#name').innerHTML=data[0];
  document.querySelector('#rating').innerHTML=data[6];
  document.querySelector('#table_name').innerHTML=data[0];
  document.querySelector('#table_age').innerHTML=data[1];
  document.querySelector('#table_ph').innerHTML=data[2];
  document.querySelector('#table_mail').innerHTML=data[3];
  document.querySelector('#table_prof').innerHTML=data[8];
  document.querySelector('#about').innerHTML=data[4];
  document.querySelector('#add').innerHTML=data[5];

  
  document.querySelector('img').scr=data[7];
  
}



const searchInput = document.getElementById("search");
searchInput.addEventListener("input", function() {
  console.log("event list");
  const searchInput = document.getElementById("search");
  const itemContainer = document.getElementById("main_card_info");
  const items = itemContainer.getElementsByClassName("main_cards_cata");
  searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();
    for (let i = 0; i < items.length; i++) {
      const item = items[i];
      const text = item.textContent.toLowerCase();
      if (text.includes(searchTerm)) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    }
  });
});
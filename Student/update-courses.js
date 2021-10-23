let div = document.createElement("div");
div.className="course-desc";

let grade = document.createElement("div");
grade.className="grade";
let per = document.createElement("div");
per.className="per";
let dot = document.createElement("div");
dot.className="dot";
let img = document.createElement('img');
img.src="../images/more.png";
dot.appendChild(img)
grade.appendChild(per);
grade.appendChild(dot);

let desc = document.createElement("div");
let cname = document.createElement("div");
let cid = document.createElement("div");
desc.appendChild(cname);
desc.appendChild(cid);

div.appendChild(grade);
div.appendChild(desc);

document.querySelector('.course-deatils').appendChild(div)



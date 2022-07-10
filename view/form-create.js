const question = document.querySelector("div #question-content");
// console.log(question);

function div() {
  return document.createElement("div");
}

function input(className, type, name, placeholder, id) {
  const input = document.createElement("input");
  input.className = className;
  input.type = type;
  input.name = name;
  input.placeholder = placeholder;
  input.id = id;
  return input;
}
function input(className, type, name, placeholder) {
  const input = document.createElement("input");
  input.className = className;
  input.type = type;
  input.name = name;
  input.placeholder = placeholder;
  return input;
}

function tambahPertanyaan() {
  pertanyaan++;
  const jmlPertanyaan = pertanyaan;
  const elemnt = document.createElement("div");
  elemnt.className = "question";
  // Create input id
  const inputID = document.createElement("input");
  inputID.value = "";
  inputID.type = "hidden";
  inputID.name = "id" + pertanyaan;
  elemnt.appendChild(inputID);
  // Delete Button
  const deleteContainer = div();
  deleteContainer.className = "end-container";
  const delBtn = deleteContainer.appendChild(document.createElement("a"));
  delBtn.className = "button2";
  delBtn.setAttribute("onclick", "deleteQuestion(this)");
  delBtn.appendChild(document.createTextNode("Delete"));
  elemnt.appendChild(deleteContainer);
  // Judul
  const judul = input(
    "title",
    "text",
    "pertanyaan" + jmlPertanyaan,
    "Masukan pertanyaan",
    ""
  );
  elemnt.appendChild(judul);
  // Pilihan a
  const pilihana = div();
  pilihana.className = "pilihan";
  const labela = document.createElement("label");
  labela.setAttribute("for", "0" + jmlPertanyaan);
  labela.appendChild(document.createTextNode("A "));
  const inputa = input(
    "",
    "text",
    "pilihan0" + jmlPertanyaan,
    "Masukan opsi A",
    "0" + jmlPertanyaan
  );
  pilihana.appendChild(labela);
  pilihana.appendChild(inputa);
  elemnt.appendChild(pilihana);
  // Pilihan b
  const pilihanb = div();
  pilihanb.className = "pilihan";
  const labelb = document.createElement("label");
  labelb.setAttribute("for", "1" + jmlPertanyaan);
  labelb.appendChild(document.createTextNode("B "));
  const inputb = input(
    "",
    "text",
    "pilihan1" + jmlPertanyaan,
    "Masukan opsi B",
    "1" + jmlPertanyaan
  );
  pilihanb.appendChild(labelb);
  pilihanb.appendChild(inputb);
  elemnt.appendChild(pilihanb);
  // Pilihan c
  const pilihanc = div();
  pilihanc.className = "pilihan";
  const labelc = document.createElement("label");
  labelc.setAttribute("for", "2" + jmlPertanyaan);
  labelc.appendChild(document.createTextNode("C "));
  const inputc = input(
    "",
    "text",
    "pilihan2" + jmlPertanyaan,
    "Masukan opsi c",
    "2" + jmlPertanyaan
  );
  pilihanc.appendChild(labelc);
  pilihanc.appendChild(inputc);
  elemnt.appendChild(pilihanc);
  // Pilihan D
  const pilihand = div();
  pilihand.className = "pilihan";
  const labeld = document.createElement("label");
  labeld.setAttribute("for", "3" + jmlPertanyaan);
  labeld.appendChild(document.createTextNode("D "));
  const inputd = input(
    "",
    "text",
    "pilihan3" + jmlPertanyaan,
    "Masukan opsi d",
    "3" + jmlPertanyaan
  );
  pilihand.appendChild(labeld);
  pilihand.appendChild(inputd);
  elemnt.appendChild(pilihand);

  question.appendChild(elemnt);
  // console.log(elemnt);
}

function tambahPertanyaane(id, soal, opsi1, opsi2, opsi3, opsi4) {
  console.log(pertanyaan);
  const jmlPertanyaan = pertanyaan;
  const elemnt = document.createElement("div");
  elemnt.className = "question";
  elemnt.id = id;
  // Create input id
  const inputID = document.createElement("input");
  inputID.value = id;
  inputID.type = "hidden";
  inputID.name = "id" + id;
  elemnt.appendChild(inputID);
  // Delete Button
  const deleteContainer = div();
  deleteContainer.className = "end-container";
  const delBtn = deleteContainer.appendChild(document.createElement("a"));
  delBtn.className = "button2";
  delBtn.setAttribute("onclick", "deleteQuestion(this)");
  delBtn.appendChild(document.createTextNode("Delete"));
  elemnt.appendChild(deleteContainer);
  // Judul
  const judul = input(
    "title",
    "text",
    "pertanyaan" + jmlPertanyaan,
    "Masukan pertanyaan",
    ""
  );
  judul.setAttribute("value", soal);
  elemnt.appendChild(judul);
  // Pilihan a
  const pilihana = div();
  pilihana.className = "pilihan";
  const labela = document.createElement("label");
  labela.setAttribute("for", "0" + jmlPertanyaan);
  labela.appendChild(document.createTextNode("A "));
  const inputa = input(
    "",
    "text",
    "pilihan0" + jmlPertanyaan,
    "Masukan opsi A",
    "0" + jmlPertanyaan
  );
  inputa.setAttribute("value", opsi1);
  pilihana.appendChild(labela);
  pilihana.appendChild(inputa);
  elemnt.appendChild(pilihana);
  // Pilihan b
  const pilihanb = div();
  pilihanb.className = "pilihan";
  const labelb = document.createElement("label");
  labelb.setAttribute("for", "1" + jmlPertanyaan);
  labelb.appendChild(document.createTextNode("B "));
  const inputb = input(
    "",
    "text",
    "pilihan1" + jmlPertanyaan,
    "Masukan opsi B",
    "1" + jmlPertanyaan
  );
  inputb.setAttribute("value", opsi2);
  pilihanb.appendChild(labelb);
  pilihanb.appendChild(inputb);
  elemnt.appendChild(pilihanb);
  // Pilihan c
  const pilihanc = div();
  pilihanc.className = "pilihan";
  const labelc = document.createElement("label");
  labelc.setAttribute("for", "2" + jmlPertanyaan);
  labelc.appendChild(document.createTextNode("C "));
  const inputc = input(
    "",
    "text",
    "pilihan2" + jmlPertanyaan,
    "Masukan opsi c",
    "2" + jmlPertanyaan
  );
  inputc.setAttribute("value", opsi3);
  pilihanc.appendChild(labelc);
  pilihanc.appendChild(inputc);
  elemnt.appendChild(pilihanc);
  // Pilihan D
  const pilihand = div();
  pilihand.className = "pilihan";
  const labeld = document.createElement("label");
  labeld.setAttribute("for", "3" + jmlPertanyaan);
  labeld.appendChild(document.createTextNode("D "));
  const inputd = input(
    "",
    "text",
    "pilihan3" + jmlPertanyaan,
    "Masukan opsi d",
    "3" + jmlPertanyaan
  );
  inputd.setAttribute("value", opsi4);
  pilihand.appendChild(labeld);
  pilihand.appendChild(inputd);
  elemnt.appendChild(pilihand);

  question.appendChild(elemnt);
  // console.log(elemnt);
}
function deleteQuestion(e) {
  const parent = e.parentElement.parentElement;
  const id = parent.id;
  if (id == "") {
    console.log("Gaada id");
    parent.remove();
  } else {
    const tambah = document.getElementById("tambah");
    const form = document.getElementById("form");
    // Tambah data yang didelete
    const deleted = document.createElement("input");
    deleted.type = "hidden";
    deleted.name = `deleted[${id}]`;
    deleted.value = id;
    // Append
    form.insertBefore(deleted, tambah);
    parent.remove();
  }
}

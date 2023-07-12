<!-- modal_2_demographics -->
<div class="modal fade" id="modal_2_demographics" tabindex="-1" role="dialog" aria-labelledby="modal_2_demographics" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" role="document" style="overflow-y: initial !important">
    <div class="modal-content">
      <div class="modal-header modal-header-removeclose" style="padding:5px; ">
        <div class="col" style="text-align:center;">
          <h5 class="modal-title">
            <span class="language-en">Tell us a bit about you:</span>
            <span class="language-pt">Conte-nos um pouco sobre você:</span>
          </h5>
        </div>
      </div>
      <div class="modal-body" style="height: 70vh; overflow-y: auto;">
        <table class="table table-hover">
          <tbody style="border-top: 1px solid gray;border-bottom: 1px solid rgba(0,0,0,0.1);">
            <!-- sex -->
            <tr>
              <th scope="row">
                <span class="language-en">Gender:</span>
                <span class="language-pt">Sexo:</span>
              </th>
              <td>
                <span class="language-en">
                  <select id="user_sex-en">
                    <option value="">Select</option>
                    <option value="f">Female</option>
                    <option value="m">Male</option>
                  </select>
                </span>
                <span class="language-pt">
                  <select id="user_sex-pt">
                    <option value="">Selecionar</option>
                    <option value="f">Feminino</option>
                    <option value="m">Masculino</option>
                  </select>
                </span>
              </td>
            </tr>
            <!-- age -->
            <tr>
              <th scope="row">
                <span class="language-en">Age Group:</span>
                <span class="language-pt">Idade:</span>
              </th>
              <td>
                <span class="language-en">
                  <select id="user_age-en">
                    <option value="">Select</option>
                    <option value="<18">Under 18 years old</option>
                    <option value="18-24">18-24 years old</option>
                    <option value="25-34">25-34 years old</option>
                    <option value="35-44">35-44 years old</option>
                    <option value="45-54">45-54 years old</option>
                    <option value="55-64">55-64 years old</option>
                    <option value=">65">65 years or older</option>
                  </select>
                </span>
                <span class="language-pt">
                  <select id="user_age-pt">
                    <option value="">Selecionar</option>
                    <option value="<18">Menor que 18 anos</option>
                    <option value="18-24">18-24 anos</option>
                    <option value="25-34">25-34 anos</option>
                    <option value="35-44">35-44 anos</option>
                    <option value="45-54">45-54 anos</option>
                    <option value="55-64">55-64 anos</option>
                    <option value=">65">65 anos ou mais</option>
                  </select>
                </span>
              </td>
            </tr>
            <!-- school -->
            <tr>
              <th scope="row">
                <span class="language-en">Education:</span>
                <span class="language-pt">Escolaridade:</span>
              </th>
              <td>
                <span class="language-en">
                  <select id="user_school-en">
                    <option value="">Select</option>
                    <option value="no_school">No schooling completed</option>
                    <option value="primary">Primary/High school</option>
                    <!-- <option value="secondary_student">Secondary/High school student</option> -->
                    <option value="secondary">Secondary/High school</option>
                    <!-- <option value="technical_student">Technical student</option> -->
                    <option value="technical">Technical degree</option>
                    <!-- <option value="bachelor_student">Bachelor student</option> -->
                    <option value="bachelor">Bachelor degree</option>
                    <!-- <option value="master_student">Master student</option> -->
                    <option value="master">Master degree</option>
                    <!-- <option value="doctorate_student">Doctorate student</option> -->
                    <option value="doctorate">Doctorate degree</option>
                    <option value="another">Another</option>
                  </select>
                </span>
                <span class="language-pt">
                  <select id="user_school-pt">
                    <option value="">Selecionar</option>
                    <option value="no_school">Nenhuma escolaridade completada</option>
                    <option value="primary">Ensino básico/fundamental</option>
                    <!-- <option value="secondary_student">Estudante de ensino secundário/médio</option> -->
                    <option value="secondary">Ensino secundário/médio</option>
                    <!-- <option value="technical_student">Estudante de nível técnico</option> -->
                    <option value="technical">Nível Técnico</option>
                    <!-- <option value="bachelor_student">Estudante de licenciatura</option> -->
                    <option value="bachelor">Licenciatura</option>
                    <!-- <option value="master_student">Estudante de mestrado</option> -->
                    <option value="master">Mestrado</option>
                    <!-- <option value="doctorate_student">Estudante de doutoramento</option> -->
                    <option value="doctorate">Doutoramento</option>
                    <option value="another">Outro</option>
                  </select>
                </span>
              </td>
            </tr>
            <!-- job -->
            <tr>
              <th scope="row">
                <span class="language-en">Profession:</span>
                <span class="language-pt">Profissão:</span>
              </th>
              <td>
                <span class="language-en">
                  <select id="user_job-en">
                    <option value="">Select</option>
                    <option value="employed_worker">Employed worker</option>
                    <option value="freelance">Freelance</option>
                    <option value="retired">Retired</option>
                    <option value="student">Student</option>
                    <option value="unemployed">Unemployed</option>
                    <option value="self_employed">Self-Employed</option>
                    <option value="other">Other</option>
                  </select>
                </span>
                <span class="language-pt">
                  <select id="user_job-pt">
                    <option value="">Selecionar</option>
                    <option value="employed_worker">Empregado(a)</option>
                    <option value="freelance">Freelance</option>
                    <option value="retired">Reformado(a)</option>
                    <option value="student">Estudante</option>
                    <option value="unemployed">Desempregado(a)</option>
                    <option value="self_employed">Trabalho por conta própria</option>
                    <option value="other">Outro</option>
                  </select>
                </span>
              </td>
            </tr>
            <!-- income -->
            <tr>
              <th scope="row">
                <span class="language-en">Household monthly income (euros):</span>
                <span class="language-pt">Renda mensal domiciliar (euros):</span>
              </th>
              <td>
                <span class="language-en">
                  <select id="user_income-en">
                    <option value="">Select</option>
                    <option value="<1000">Less than 1000</option>
                    <option value="1000–1499">1000–1499</option>
                    <option value="1500–1999">1500–1999</option>
                    <option value="2000–2999">2000–2999</option>
                    <option value="3000–4999">3000–4999</option>
                    <option value=">5000">More than 5000</option>
                    <option value="NA">I prefer not to answer</option>
                  </select>
                </span>
                <span class="language-pt">
                  <select id="user_income-pt">
                    <option value="">Selecionar</option>
                    <option value="<1000">Menos que 1000</option>
                    <option value="1000–1499">1000–1499</option>
                    <option value="1500–1999">1500–1999</option>
                    <option value="2000–2999">2000–2999</option>
                    <option value="3000–4999">3000–4999</option>
                    <option value=">5000">Mais que 5000</option>
                    <option value="NA">Prefiro não responder</option>
                  </select>
                </span>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="text-center">
                <label style="margin-right: 15px">
                  <input type="radio" name="type_user" value="resident" class="survey_sus">
                  <span class="language-en"><b>Resident</b> of Lisbon (or surroundings)</span>
                  <span class="language-pt"><b>Residente</b> em Lisboa (ou arredores)</span>
                </label>

                <label>
                  <input type="radio" name="type_user" value="visitor" class="survey_sus">
                  <span class="language-en"><b>Visitor</b></span>
                  <span class="language-pt"><b>Visitante</b></span>
                </label>
              </td>
            </tr>

          </tbody>
        </table>
        <div class="col" style="font-size:12px">
          <span class="language-en">All fields are required</span>
          <span class="language-pt">Todos os campos são obrigatórios</span>
        </div>
      </div> <!-- modal body -->
      <div class="modal-footer" style="border:none;">
        <div class="container-fluid">
          <div class="col">
            <div>
              <button type="button" id="btn_close_modal_demographics" class="btn btn-primary btn-block">
                <span class="language-en">Access map!</span>
                <span class="language-pt">Acessar mapa!</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!--/.modal-content -->
  </div> <!--/.modal-dialog -->
</div>  <!--/.modal -->



<!-- modal_3_sus -->
<div class="modal fade" id="modal_3_sus" tabindex="-1" role="dialog" aria-labelledby="modal_3_sus" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-lg" role="document" style="overflow-y: initial !important">
    <div class="modal-content">
      <div class="modal-header modal-header-removeclose" style="padding:5px; ">
        <div class="col" style="text-align:center;">
          <h5 class="modal-title" style="padding:0;margin:0; font-size: 1.6vw">
            <span class="language-en">Your Feedback about eImage LX:</span>
            <span class="language-pt">Sua opinião sobre eImage LX:</span>
          </h5>
        </div>
      </div>
      <div class="modal-body" style="height: 70vh; overflow-y: auto;">

        <div class="sus">
          <table class="table table-hover" style="padding:0;margin:0;">
            <thead style="padding:0;margin:0;">
              <tr>
                <th class="sus_index"></th>
                <th class="sus_question"></th>
                <th class="sus_cbx">
                  <span class="language-en">Strongly disagree</span>
                  <span class="language-pt">Discordo totalmente</span>
                </th>
                <th class="sus_cbx">
                  <span class="language-en">Disagree</span>
                  <span class="language-pt">Discordo parcialmente</span>
                </th>
                <th class="sus_cbx">
                  <span class="language-en">Neutral</span>
                  <span class="language-pt">Indiferente</span>
                </th>
                <th class="sus_cbx">
                  <span class="language-en">Agree</span>
                  <span class="language-pt">Concordo parcialmente</span>
                </th>
                <th class="sus_cbx">
                  <span class="language-en">Strongly agree</span>
                  <span class="language-pt">Concordo totalmente</span>
                </th>
              </tr>
            </thead>
            <tbody style="border-top: 1px solid gray;border-bottom: 1px solid rgba(0,0,0,0.1); padding:0;margin:0;">
              <tr>
                <td class="sus_index">1.</td>
                <td class="sus_question">
                  <span class="language-en">I think that I would like to use this system frequently. </span>
                  <span class="language-pt">Acho que gostaria de utilizar este sistema com frequência. </span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest1" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest1" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest1" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest1" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest1" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">2.</td>
                <td class="sus_question">
                  <span class="language-en">I found the system unnecessarily complex. </span>
                  <span class="language-pt">Considerei o sistema mais complexo do que necessário. </span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest2" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest2" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest2" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest2" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest2" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">3.</td>
                <td class="sus_question">
                  <span class="language-en">I thought the system was easy to use</span>
                  <span class="language-pt">Achei o sistema fácil de utilizar. </span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest3" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest3" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest3" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest3" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest3" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">4.</td>
                <td class="sus_question">
                  <span class="language-en">I think that I would need the support of a technical person to be able to use this system.</span>
                  <span class="language-pt">Acho que necessitaria de ajuda de um técnico para conseguir utilizar este sistema.</span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest4" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest4" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest4" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest4" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest4" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">5.</td>
                <td class="sus_question">
                  <span class="language-en">I found the various functions in this system were well integrated</span>
                  <span class="language-pt">Considerei que as várias funcionalidades deste sistema estavam bem integradas.</span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest5" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest5" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest5" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest5" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest5" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">6.</td>
                <td class="sus_question">
                  <span class="language-en">I thought there was too much inconsistency in this system. </span>
                  <span class="language-pt">Achei que este sistema tinha muitas inconsistências. </span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest6" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest6" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest6" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest6" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest6" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">7.</td>
                <td class="sus_question">
                  <span class="language-en">I would imagine that most people would learn to use this system very quickly</span>
                  <span class="language-pt">Suponho que a maioria das pessoas aprenderia a utilizar rapidamente este sistema.</span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest7" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest7" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest7" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest7" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest7" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">8.</td>
                <td class="sus_question">
                  <span class="language-en">I found the system very cumbersome to use.</span>
                  <span class="language-pt">Considerei o sistema muito complicado de utilizar. </span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest8" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest8" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest8" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest8" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest8" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">9.</td>
                <td class="sus_question">
                  <span class="language-en">I felt very confident using the system. </span>
                  <span class="language-pt">Senti-me muito confiante a utilizar este sistema. </span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest9" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest9" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest9" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest9" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest9" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">10.</td>
                <td class="sus_question">
                  <span class="language-en">I needed to learn a lot of things before I could get going with this system.</span>
                  <span class="language-pt">Tive que aprender muito antes de conseguir lidar com este sistema.</span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest10" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest10" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest10" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest10" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest10" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">11.</td>
                <td class="sus_question">
                  <span class="language-en">This app helps me say what I like/dislike effectively.</span>
                  <span class="language-pt">Esse aplicativo me ajuda de forma efetiva a dizer o que eu gosto/não gosto.</span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest11" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest11" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest11" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest11" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest11" class="survey_sus" value="5"></td>
              </tr>
              <tr>
                <td class="sus_index">12.</td>
                <td class="sus_question">
                  <span class="language-en">This app could be an effective way to give feedback to my city council.</span>
                  <span class="language-pt">Esse aplicativo pode ser uma maneira eficaz de fornecer feedback ao meu conselho municipal.</span>
                </td>
                <td class="sus_cbx"><input type="radio" name="quest12" class="survey_sus" value="1"></td>
                <td class="sus_cbx"><input type="radio" name="quest12" class="survey_sus" value="2"></td>
                <td class="sus_cbx"><input type="radio" name="quest12" class="survey_sus" value="3"></td>
                <td class="sus_cbx"><input type="radio" name="quest12" class="survey_sus" value="4"></td>
                <td class="sus_cbx"><input type="radio" name="quest12" class="survey_sus" value="5"></td>
              </tr>
          </tbody>
          </table>
        </div>


        <!-- <div class="col" style="font-size:12px">
          <span class="language-en">*Required fields</span>
          <span class="language-pt">*Campos Obrigatórios</span>
        </div>
        input: would people like this way to send
        input: would people like this way to send Would you like this evaluative approach to send feedback to your city council? -->

      </div> <!-- modal body -->
      <div class="modal-footer" style="border:none;">
        <div class="container-fluid">
          <div class="col" style="text-align:center;" >
              <button type="button" id="btn_close_modal_sus" class="btn btn-primary">
                <span style="font-size:1.6vw;">
                  <span class="language-en">See final result!</span>
                  <span class="language-pt">Ver resultado final!</span>
                </span>
              </button>
          </div>
        </div>
      </div>
    </div> <!--/.modal-content -->
  </div> <!--/.modal-dialog -->
</div>  <!--/.modal -->

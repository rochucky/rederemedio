<div class="cadastro">
  <form>
    <div class="formItem">
      <label for="cnpj">CNPJ</label>
      <input type="text" name="cnpj" id="cnpj" required/>
    </div>
    <div class="formItem">
      <label for="company_name">Razão Social</label>
      <input type="text" name="company_name" id="company_name" required/>
    </div>
    <div class="formItem">
      <label for="trade_name">Nome Fantasia</label>
      <input type="text" name="trade_name" id="trade_name" required/>
    </div>
    <div class="formItem">
      <label for="type">Tipo</label>
      <select type="text" name="type" id="type" required>
        <option value="">Selecione</option>
        <option value="matriz">Matriz</option>
        <option value="filial">Filial</option>
      </select>
    </div>
    <div class="formItem">
      <label for="open_date">Data de Abertura</label>
      <input type="date" name="open_date" id="open_date" required/>
    </div>
    <div class="formItem">
      <label for="main_activity">CNAE Atividade Principal</label>
      <input type="text" name="main_activity" id="main_activity" required/>
    </div>
    <div class="formItem">
      <label for="main_activity_description">Descrição da Atividade Principal</label>
      <textarea type="text" name="main_activity_description" id="main_activity_description" required></textarea>
    </div>
    <div class="formItem">
      <label for="company_type">Opção</label>
      <select name="company_type" id="company_type" required>
        <option value="">Selecione</option>
        <option value="MEI">MEI</option>
        <option value="SIMPLES">SIMPLES</option>
        <option value="LUCRO REAL">LUCRO REAL</option>
        <option value="LUCRO PRESUMIDO">LUCRO PRESUMIDO</option>
      </select>
    </div>
    <div class="formItem">
      <label for="address">Logradouro</label>
      <input type="text" name="address" id="address" required/>
    </div>
    <div class="formItem">
      <label for="number">Número</label>
      <input type="text" name="number" id="number" required/>
    </div>
    <div class="formItem">
      <label for="complement">Complemento</label>
      <input type="text" name="complement" id="complement"/>
    </div>
    <div class="formItem">
      <label for="postal_code">CEP</label>
      <input type="text" name="postal_code" id="postal_code" required/>
    </div>
    <div class="formItem">
      <label for="neighborhood">Bairro</label>
      <input type="text" name="neighborhood" id="neighborhood" required/>
    </div>
    <div class="formItem">
      <label for="state">Estado</label>
      <select name="state" id="state" required>
        <option value="">Selecione</option>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MT">MT</option>
        <option value="MS">MS</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
      </select>
    </div>
    <div class="formItem">
      <label for="city">Cidade</label>
      <input type="text" name="city" id="city" required/>
    </div>
    <div class="formItem">
      <label for="website">Site</label>
      <input type="text" name="website" id="website"/>
    </div>
    <div class="formItem">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required/>
    </div>
    <div class="formItem">
      <label for="phone">Telefone</label>
      <input type="tel" name="phone" id="phone" required/>
    </div>
    <div class="formItem">
      <label for="whatsapp">WhatsApp</label>
      <input type="tel" name="whatsapp" id="whatsapp"/>
    </div>
    <div class="formItem">
      <label for="telegram">Telegram</label>
      <input type="text" name="telegram" id="telegram"/>
    </div>
    <div class="formItem">
      <label for="facebook">Facebook</label>
      <input type="text" name="facebook" id="facebook"/>
    </div>
    <div class="formItem">
      <label for="instagram">Instagram</label>
      <input type="text" name="instagram" id="instagram"/>
    </div>
    <div class="formItem">
      <label for="pinterest">Pinterest</label>
      <input type="text" name="pinterest" id="pinterest"/>
    </div>
    <div class="formItem">
      <label for="installments_over">Parcelamento a partir de</label>
      <input type="number" name="installments_over" id="installments_over"/>
    </div>
    <div class="formItem">
      <label for="free_shipping_over">Frete grátis a partir de</label>
      <input type="number" name="free_shipping_over" id="free_shipping_over"/>
    </div>
    

    <div class="buttons">
      <button type="submit" class="confirm">Gravar</button>
      <button class="cancel">Cancelar alterações</button>
    </div>
  </form>
</div>
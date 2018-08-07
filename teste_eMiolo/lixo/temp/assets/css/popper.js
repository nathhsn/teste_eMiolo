.link-anchor {
  posição : relativa ;
  largura : 0 ;
  tamanho da fonte : .8 em ;
  opacidade : 0 ;
  transição : opacidade .2 s  facilidade-out-out ;
}
.anchor-wrapper {
  fronteira : nenhuma ;
}
.anchor-wrapper : hover  .link-anchor {
  opacidade : 1 ;
}

seção  h1 [ id ] : foco ,
seção  h2 [ id ] : foco ,
seção  h3 [ id ] : foco ,
seção  h4 [ id ] : foco ,
seção  h5 [ id ] : focus {
  esboço : 0 ;
}

p .thin {
    font-weight : 100 ;
    margem : 0 ;
    altura da linha : 1,2 em ;
}

p .bold {
    font-weight : 900 ;
    margem : 0 ;
    margem superior : -5 px ;
}

.rel {
    largura : 30 % ;
    margem : 0  auto ;
    posição : relativa ;
    texto-alinhar : centro ;
    preenchimento : 20 px ;
    estilo de borda : pontilhado ;
    border-color : branco ;
    largura da borda : média ;
}

.popper ,
.tooltip {
    posição : absoluta ;
    fundo : # FFC107 ;
    cor : preto ;
    largura : 150 px ;
    raio de fronteira : 3 px ;
    box-shadow : 0  0  2 px  rgba ( 0 , 0 , 0 , 0,5 );
    preenchimento : 10 px ;
    texto-alinhar : centro ;
}
.style5  .tooltip {
    fundo : # 1E252B ;
    cor : #FFFFFF ;
    largura máxima : 200 px ;
    largura : auto ;
    tamanho da fonte : .8 rem ;
    preenchimento : .5 em  1 em ;
}
.popper  .popper__arrow ,
.tooltip  .tooltip-arrow {
    largura : 0 ;
    altura : 0 ;
    estilo de borda : sólido ;
    posição : absoluta ;
    margem : 5 px ;
}

.tooltip  .tooltip-arrow ,
.popper  .popper__arrow {
    border-color : # FFC107 ;
}
.style5  .tooltip  .tooltip-arrow {
    cor da borda : # 1E252B ;
}
.popper [ x-placement ^ = " top " ],
.tooltip [ x-placement ^ = " top " ] {
    margem inferior : 5 px ;
}
.popper [ x-placement ^ = " top " ] .popper__arrow ,
.tooltip [ x-placement ^ = " top " ] .tooltip-arrow {
    largura da borda : 5 px  5 px  0  5 px ;
    border-left-color : transparente ;
    border-right-color : transparente ;
    border-bottom-color : transparente ;
    fundo : -5 px ;
    esquerda : calc ( 50 %  -  5 px );
    margem superior : 0 ;
    margem-fundo : 0 ;
}
.popper [ x-placement ^ = " bottom " ],
.tooltip [ x-placement ^ = " bottom " ] {
    margem superior : 5 px ;
}
.tooltip [ x-placement ^ = " bottom " ] .tooltip-arrow ,
.popper [ x-placement ^ = " bottom " ] .popper__arrow {
    largura da borda : 0  5 px  5 px  5 px ;
    border-left-color : transparente ;
    border-right-color : transparente ;
    border-top-color : transparente ;
    topo : -5 px ;
    esquerda : calc ( 50 %  -  5 px );
    margem superior : 0 ;
    margem-fundo : 0 ;
}
.tooltip [ x-placement ^ = " right " ],
.popper [ x-placement ^ = " right " ] {
    margem esquerda : 5 px ;
}
.popper [ x-placement ^ = " right " ] .popper__arrow ,
.tooltip [ x-placement ^ = " right " ] .tooltip-arrow {
    largura da borda : 5 px  5 px  5 px  0 ;
    border-left-color : transparente ;
    border-top-color : transparente ;
    border-bottom-color : transparente ;
    esquerda : -5 px ;
    topo : calc ( 50 %  -  5 px );
    margem esquerda : 0 ;
    margem-direita : 0 ;
}
.popper [ x-placement ^ = " left " ],
.tooltip [ x-placement ^ = " left " ] {
    margem direita : 5 px ;
}
.popper [ x-placement ^ = " left " ] .popper__arrow ,
.tooltip [ x-placement ^ = " left " ] .tooltip-arrow {
    largura da borda : 5 px  0  5 px  5 px ;
    border-top-color : transparente ;
    border-right-color : transparente ;
    border-bottom-color : transparente ;
    direita : -5 px ;
    topo : calc ( 50 %  -  5 px );
    margem esquerda : 0 ;
    margem-direita : 0 ;
}
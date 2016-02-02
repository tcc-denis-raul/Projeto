#!/bin/bash

#Script para executar os testes do php
#A variável sufixo serve para identifcar o final do nome dos arquivos de que contém teste.
#A variável path_test indica o caminho até a pasta que contém os arquivos de teste
#O vetor path_array contém os caminhos dos diretórios em que estão os códigos a serem testados


#Sufixo dos arquivos de teste
sufixo="_test.php"
#caminho para o diretório onde se encontra os teste
path_test="teste/"
#caminho dos arquivos a serem testados
path_array=("src/Script")

for dir in "${path_array[@]}"
do
        if [ ! -d $dir ]
        then
                echo "$dir não existe"
                exit 1
        fi
        for arquivo in "$dir/"*
        do
                nome_arquivo=$(echo $arquivo | rev | cut -d"/" -f1 | rev | cut -d'.' -f1)
                script_teste="$path_test/script/${nome_arquivo}$sufixo"
                if [ -e $script_teste ]
                then
                        echo "Testando: $arquivo"
                        phpunit --bootstrap $arquivo $script_teste
                else
                        echo "$arquivo sem teste"
                fi
        done
done

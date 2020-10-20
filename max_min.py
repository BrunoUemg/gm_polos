import random #importa lib de geração de aleatorios
from random import randint #importa geração de inteiros aleatorios
import timeit #importa lib de hora
import time
lista1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
    21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40] #Cria lista ordenada crescente
lista2 = [40, 39, 38, 37, 36, 35, 34, 33, 32, 31, 30, 29, 28, 27, 26, 25, 24, 23,
    22, 21, 20, 19, 18, 17, 16, 15, 14, 13, 12, 11, 10, 9, 8, 7, 6, 5, 4, 3, 2, 1] #Cria lista ordenada descrescente
lista3 = [23, 32, 39, 21, 9, 2, 18, 26, 14, 4, 7, 16, 1, 36, 22, 28, 29, 10, 19,
    35, 27, 15, 5, 11, 24, 38, 17, 12, 30, 40, 13, 31, 33, 25, 8, 34, 37, 20, 3, 6] #Cria lista desordenada
lista4 = random.sample(range(1, 41), 40) #Cria lista aleatoria
print("Random List ", lista4) # Imprime a lista aleatoria gerada
open('resultados.txt', 'w').close() # Cria caso não exista, e limpa o arquivo resultado caso já exista

def searchList(search, lista, name): #Função de busca na lista
    inicio=timeit.default_timer() # Armazena o horario de inicio da execução
    cont=1 # Contador de comparações
    for num in lista: # Estrutura de repetição percorrendo a lista recebida pela função        
        if num != search: # Se num diferente do número procurado
            cont += 1 # Contador +1
        else: # Senão            
            print(f"Número de comparações (Lista {name}) : {cont}") # Imprime o número de comparações e o nome da lista  
            fim=timeit.default_timer() # Armazena o horario do fim da busca          
            print("Duracao: %f" % (fim - inicio)) # Imprime o calculo da diferença entre o fim da busca e o inicio da busca
            arquivo = open('resultados.txt','a+') # Abre o arquivo txt criado
            arquivo.write(f"\n----------------------------------------------\n")   # Separador
            arquivo.write(f"Lista {name}\n") #Salva no arquivo o nome da lista
            arquivo.write(f"Número de comparações: {cont}\n") #Salva no arquivo o número de comparações da lista
            arquivo.write("Duracao: %f\n" % (fim - inicio)) #Salva no arquivo a duração da lista
            arquivo.write(f"Número Buscado: {search}\n") #Salva no arquivo o número buscado da lista
            arquivo.write(f"----------------------------------------------\n") # Separador            
            arquivo.close() # Fecha o arquivo txt e salva

ram = (randint(1, 40)) #Gera um número aleatório para ser buscado
print(f"Número Buscado: {ram}") #Imprime o número gerado e a ser buscado
searchList(ram, lista1, "Ordenada Ascendente") #Chama a função de busca na lista, passando o número gerado, a lista a ser buscada e o nome da lista
searchList(ram, lista2, "Ordenada Descendente") #Chama a função de busca na lista, passando o número gerado, a lista a ser buscada e o nome da lista
searchList(ram, lista3, "Desordenada") #Chama a função de busca na lista, passando o número gerado, a lista a ser buscada e o nome da lista
searchList(ram, lista4, "Aleatória") #Chama a função de busca na lista, passando o número gerado, a lista a ser buscada e o nome da lista
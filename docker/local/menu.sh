#!/bin/bash

clear
ROOT_DIRETORY="$(pwd)"

clean_docker_data(){
    cd $ROOT_DIRETORY/docker-data

    rm -rf assets db-data logs private-files public-files

    cd $ROOT_DIRETORY/dev
}

clear
ROOT_DIRETORY="$(pwd)"
cd $ROOT_DIRETORY/docker/local

CONTAINER_MAPA=mapas-ES
CONTAINER_REDIS=redis-mapas
CONTAINER_MAILHOG=mailhog-mapas
CONTAINER_DB=db-mapas

CONTAINERS="$CONTAINER_MAPA $CONTAINER_REDIS $CONTAINER_MAILHOG $CONTAINER_DB"

COLUMNS=1
PS3=$'\nSelecione: '
select OPTIONS in \
    "Start Ambiente Local" \
    "Build Ambiente Local" \
    "Exibir Logs" \
    "Acessar Container" \
    "Parar Containers" \
    "Apagar Containers" \
    "Apagar Ambiente Local" \
    "Sair"; do

case $OPTIONS in

    "Start Ambiente Local")
        clear
        docker compose up -d
        echo ""

        echo "Ambiente pronto..."
        read -p "[Enter para continuar]"
        clear
        COLUMNS=1
        ;;

    "Build Ambiente Local")
        clear
        docker compose up -d --build
        echo ""

        echo "Ambiente pronto..."
        read -p "[Enter para continuar]"
        clear
        COLUMNS=1
        ;;

    "Exibir Logs")
        clear
        echo "Ctrl+C para fechar"

        docker logs -f $CONTAINER_MAPA

        COLUMNS=1
        ;;

    "Acessar Container")
        clear
        echo "Use Ctrl+D para sair do container"

        docker exec -it $CONTAINER_MAPA  /bin/bash

        COLUMNS=1
        ;;

    "Parar Containers")
        clear
        echo "Parando $CONTAINERS..."

        docker container stop $CONTAINERS

        echo ""
        echo "Containers paralisados, volumes mantidos."
        read -p "[Enter para continuar]"
        clear
        COLUMNS=1
        ;;

    "Apagar Containers")
        clear

        docker compose down

        echo ""
        echo "Containers e volumes deletados."
        read -p "[Enter para continuar]"
        clear
        COLUMNS=1
        ;;

    "Apagar Ambiente Local")
        clear

        docker compose down --rmi 'all'
        docker system prune -f --volumes

        clean_docker_data

        echo ""
        echo "Ambiente apagado: Containers, Imagens, Volumes, Networks e pasta docker-data (menos certbot e nginx)."
        read -p "[Enter para continuar]"
        clear
        COLUMNS=1
        ;;

    "Sair")
        clear
        break
        COLUMNS=1
        ;;
esac
done
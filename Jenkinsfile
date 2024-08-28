pipeline {
    agent any

    environment {
        DOCKER_IMAGE = 'shivaminc/todo-app'
        DOCKER_TAG = "${env.BUILD_NUMBER}"
        // DEPLOY_DIR = '/var/www/html/todo-app'
        REPO_URL = 'https://github.com/Shivaminc/Jenkins_Test'
    }

    stages {
        stage('Checkout') {
            steps {
                echo 'Cloning repository...'
                git url: "${REPO_URL}", branch: 'main'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo 'Building Docker image...'
                sh 'docker build -t ${DOCKER_IMAGE}:${DOCKER_TAG} .'
            }
        }

        stage('Push Docker Image') {
            steps {
                script {
                    def dockerImage = "${DOCKER_IMAGE}:${DOCKER_TAG}"
                    echo "Pushing Docker image ${dockerImage}..."
                    
                    withCredentials([usernamePassword(credentialsId: 'dockerhub-credentials-id', usernameVariable: 'DOCKERHUB_USER', passwordVariable: 'DOCKERHUB_PASS')]) {
                        sh 'echo $DOCKERHUB_PASS | docker login -u $DOCKERHUB_USER --password-stdin'
                        sh "docker push ${dockerImage}"
                    }
                }
            }
        }

        stage('Deploy with Docker') {
            steps {
                echo 'Deploying application with Docker...'
                sh '''
                docker stop todo-app || true
                docker rm todo-app || true
                docker run -d --name todo-app -p 9001:80 ${DOCKER_IMAGE}:${DOCKER_TAG}
                '''
            }
        }
    }

    post {
        success {
            echo 'Deployment completed successfully!'
        }
        failure {
            echo 'Deployment failed!'
            sh 'docker logs todo-app'
        }
    }
}

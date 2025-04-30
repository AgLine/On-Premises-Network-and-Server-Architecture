# On-Premises-Network-and-Server-Architecture
Internal Network Setup with DNS, Web, HAProxy, and Database Integration

온프레미스 네트워크와 서버 환경 설계 및 구축

## 프로젝트 개요

이 프로젝트는 VMware 가상 환경 내에서 Rocky Linux 9 기반 서버들을 구성하여, 내부망 통신 및 외부 접속을 가능하게 하는 네트워크 인프라를 구현한 것입니다. 각 구성 요소는 다음과 같은 역할을 수행합니다.

---
## 사용 기술 및 도구

- **OS**: Rocky Linux 9  
- **가상화**: VMware Workstation (LAN Segment 사용)  
- **서버 구성**: Apache, BIND, DHCP, HAProxy  
- **DB 연동**: MySQL + PHP  
- **네트워크 구성**: NAT, 포트포워딩, 방화벽 설정

---

## 주요 구성 요소

- **Router**
  - ens160 (외부망) / ens224 (내부망) 인터페이스 분리
  - DHCP 설정으로 내부 IP 자동 할당
  - 방화벽(http 서비스 허용) 및 포트포워딩(NAT) 설정

- **DNS 서버**
  - 내부 도메인: `wxforecast.gisang.chung`
  - BIND9 구성 (정방향/역방향 zone 파일 포함)
  - 내부 클라이언트의 DNS 요청 처리

- **Web01 / Web02**
  - Apache 설치 및 서비스 실행
  - 내부 DNS로 접근 가능 (`web01.wxforecast.gisang.chung` 등)
  - 간단한 index.html 및 PHP 파일 구성

- **HAProxy**
  - 외부 포트 9090 → 내부 웹서버 트래픽 분산
  - `roundrobin` 방식 사용
  - `option httpchk`를 통해 웹서버 헬스체크 설정

- **DB 연동**
  - 외부 MySQL 서버(`10.128.0.10`)에 접속하여 쿼리 실행
  - PHP를 통해 DB 데이터 출력 웹페이지 구현
  - `telnet`, `mysql` 명령어로 연결 테스트 수행

---
## 외부 접속 설정

- VMware NAT 설정에서 포트포워딩 구성  
  → 예: `호스트포트 9090` → `게스트포트 80 (HAProxy)`
- 방화벽: `firewall-cmd --permanent --add-service=http` 후 reload
- `resolv.conf` 및 라우터의 `DNS1` 설정을 통해 내부 DNS 우선 처리

---
## OVA 파일 다운로드 (Virtual Machine Images)

본 프로젝트에서 사용된 가상머신 이미지입니다. 각 OVA 파일은 개별 구성요소를 포함하고 있으며, VMware에서 불러와 사용할 수 있습니다.

| 역할(Role)         | 설명(Description)                               | 다운로드 링크(Link) |
|--------------------|--------------------------------------------------|----------------------|
| Router          | 내부망과 외부망을 연결하는 라우터 역할 수행      | [다운로드](https://drive.google.com/file/d/1Sx_yacxsK2HVWM9g0mEoDsCK63M78RKu/view?usp=sharing) |
| DNS Server      | 내부 도메인(DNS) 처리 서버, `wxforecast.gisang.chung` 도메인 사용 | [다운로드](https://drive.google.com/file/d/1mlTmQsWYuhVILwrDF2hJWYgHQ5AzESuN/view?usp=sharing) |
| Web Server 01   | Apache 기반 웹서버 1번 (Load Balancing 대상)     | [다운로드](https://drive.google.com/file/d/1XAZbSjVd9h4pHQhQeGAIKIgkw9LC-E8Y/view?usp=sharing) |
| Web Server 02   | Apache 기반 웹서버 2번 (Load Balancing 대상)     | [다운로드](https://drive.google.com/file/d/1Tp69APZDsZxO_i2eXEEfTGWIHVlFkD_F/view?usp=sharing) |
| Rocky9 Base     | 웹서버 제작 시 사용된 초기 Rocky Linux 9 이미지   | [다운로드](https://drive.google.com/file/d/1TGywo6VcY6nVxoJuD44Y98H67A8iwjvA/view?usp=sharing) |

## 결과 화면
![image](https://github.com/user-attachments/assets/0c67afb5-3d00-4077-8241-9ac5458d4689)

![image](https://github.com/user-attachments/assets/929ce8b8-a9ba-4c86-be41-fce9c5c5adad)

![image](https://github.com/user-attachments/assets/492ff7f0-b6da-4db5-b72f-29e7bd2c18bc)

![image](https://github.com/user-attachments/assets/9114b86d-4508-43e3-af14-d49601b43bdd)

![image](https://github.com/user-attachments/assets/eee569d3-3875-4bde-89fa-7e9bc9cdc06e)

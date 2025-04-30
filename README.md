# On-Premises-Network-and-Server-Architecture
Internal Network Setup with DNS, Web, HAProxy, and Database Integration

온프레미스 네트워크와 서버 환경 설계 및 구축

## 📦 OVA 파일 다운로드 (Virtual Machine Images)

본 프로젝트에서 사용된 가상머신 이미지입니다. 각 OVA 파일은 개별 구성요소를 포함하고 있으며, VMware에서 불러와 사용할 수 있습니다.

| 역할(Role)         | 설명(Description)                               | 다운로드 링크(Link) |
|--------------------|--------------------------------------------------|----------------------|
| Router          | 내부망과 외부망을 연결하는 라우터 역할 수행      | [다운로드](https://drive.google.com/file/d/1Sx_yacxsK2HVWM9g0mEoDsCK63M78RKu/view?usp=sharing) |
| DNS Server      | 내부 도메인(DNS) 처리 서버, `wxforecast.gisang.chung` 도메인 사용 | [다운로드](https://drive.google.com/file/d/1mlTmQsWYuhVILwrDF2hJWYgHQ5AzESuN/view?usp=sharing) |
| Web Server 01   | Apache 기반 웹서버 1번 (Load Balancing 대상)     | [다운로드](https://drive.google.com/file/d/1XAZbSjVd9h4pHQhQeGAIKIgkw9LC-E8Y/view?usp=sharing) |
| Web Server 02   | Apache 기반 웹서버 2번 (Load Balancing 대상)     | [다운로드](https://drive.google.com/file/d/1Tp69APZDsZxO_i2eXEEfTGWIHVlFkD_F/view?usp=sharing) |
| Rocky9 Base     | 웹서버 제작 시 사용된 초기 Rocky Linux 9 이미지   | [다운로드](https://drive.google.com/file/d/1TGywo6VcY6nVxoJuD44Y98H67A8iwjvA/view?usp=sharing) |
